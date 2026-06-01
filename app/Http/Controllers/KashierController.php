<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Donation;

class KashierController extends Controller
{
    private $apiUrl;
    private $mid;
    private $apiKey;
    private $secretKey;
    
    public function __construct()
    {
        // Use correct API endpoint from documentation
        $mode = config('services.kashier.mode', 'live');
        $this->apiUrl = $mode === 'test' 
            ? 'https://test-api.kashier.io/v3/payment/sessions' 
            : 'https://api.kashier.io/v3/payment/sessions';
        
        $this->mid = config('services.kashier.mid');
        $this->apiKey = config('services.kashier.api_key');
        $this->secretKey = config('services.kashier.secret_key');
    }


private function setCredentialsByType(string $type): void
{
    $isZakat = $type === 'زكاة المال'  ;

    $configKey = $isZakat ? 'kashier_zakat' : 'kashier_sadaqa';

    $this->mid       = config("services.{$configKey}.mid");
    $this->apiKey    = config("services.{$configKey}.api_key");
    $this->secretKey = config("services.{$configKey}.secret_key");

    Log::info('Kashier account selected: ' . $configKey . ' for type: ' . $type);
}


   public function createPaymentSession(Request $request)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'type' => 'required|string',
        'service_name' => 'required|string'
    ]);

    // Generate unique order ID
    $orderId = 'ORD-' . time() . '-' . Str::random(6);

    // Store donation in database
    try {
          // ✅ تحديد الحساب على حسب النوع
    
        $this->setCredentialsByType($request->type);

        $donation = Donation::create([
            'order_id' => $orderId,
            'amount' => $request->amount,
            'type' => $request->type,
            'service_name' => $request->service_name,
            'status' => 'pending',
            'currency' => 'EGP'
        ]);
    } catch (\Exception $e) {
        Log::error('Failed to create donation record: ' . $e->getMessage());
    }

    try {
        // Prepare payment data according to Kashier v3 API documentation
        $paymentData = [
            'merchantId' => $this->mid,
            'amount' => (string)$request->amount,
            'currency' => 'EGP',
            'order' => $orderId,  // ✅ تغيير من orderId إلى order
            'description' => $request->service_name . ' - ' . $request->type,
            'merchantRedirect' => route('kashier.success'),
            'failureRedirect' => true,
            'serverWebhook' => config('services.kashier.callback_url'),
            'display' => 'ar',
            'type' => 'external',
            'paymentType' => 'credit',
            'allowedMethods' => 'card,wallet',
            'expireAt' => now()->addHours(24)->toIso8601String(),
            'maxFailureAttempts' => 3,
            'customer' => [
                'email' => 'donor@dareltawfik.org',
                'reference' => $orderId
            ],
            'metaData' => [
                'donation_type' => $request->type,
                'service_name' => $request->service_name
            ]
        ];

        Log::info('Kashier Payment Request:', [
            'url' => $this->apiUrl,
            'data' => $paymentData
        ]);

        // Create payment session using v3 API with correct headers
        $response = Http::withHeaders([
            'Authorization' => $this->secretKey,
            'api-key' => $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ])->post($this->apiUrl, $paymentData);

        Log::info('Kashier Response Status: ' . $response->status());
        Log::info('Kashier Response Body: ' . $response->body());

        if ($response->successful()) {
            $data = $response->json();
            
            Log::info('Kashier Success Response:', $data);
            
            // Update donation with session details
            if (isset($donation)) {
                $donation->update([
                    'payment_session_id' => $data['_id'] ?? null
                ]);
            }

            // Get session URL from response
            $sessionUrl = $data['sessionUrl'] ?? null;
            
            if ($sessionUrl) {
                return response()->json([
                    'success' => true,
                    'redirect_url' => $sessionUrl
                ]);
            } else {
                Log::error('No sessionUrl in Kashier response', ['response' => $data]);
                return response()->json([
                    'success' => false,
                    'message' => 'لم يتم العثور على رابط الدفع'
                ], 400);
            }
        } else {
            Log::error('Kashier API Error Response:', [
                'status' => $response->status(),
                'body' => $response->body(),
                'headers' => $response->headers()
            ]);
            
            $errorMessage = 'فشل في إنشاء جلسة الدفع';
            
            // Try to get error message from response
            if ($response->json()) {
                $responseData = $response->json();
                $errorMessage .= ': ' . ($responseData['message'] ?? $responseData['error'] ?? json_encode($responseData));
            }
            
            return response()->json([
                'success' => false,
                'message' => $errorMessage,
                'details' => $response->json()
            ], 400);
        }

    } catch (\Exception $e) {
        Log::error('Kashier Payment Exception: ' . $e->getMessage());
        Log::error('Stack trace: ' . $e->getTraceAsString());
        
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء معالجة الطلب: ' . $e->getMessage()
        ], 500);
    }
}

    public function handleCallback(Request $request)
    {
        Log::info('Kashier Callback Received:', $request->all());
        
        $orderId = $request->input('merchantOrderId') ?? $request->input('orderId');
        $status = $request->input('status');

        if ($orderId) {
            $donation = Donation::where('order_id', $orderId)->first();
            
            if ($donation) {
                $donationStatus = match(strtoupper($status)) {
                    'SUCCESS', 'CAPTURED', 'PAID' => 'completed',
                    'PENDING' => 'pending',
                    default => 'failed'
                };

                $donation->update([
                    'status' => $donationStatus,
                    'transaction_id' => $request->input('transactionId') ?? $request->input('kashierTransactionId'),
                    'payment_method' => $request->input('method') ?? $request->input('paymentMethod'),
                    'response_data' => json_encode($request->all())
                ]);

                Log::info('Donation updated: ' . $orderId . ' - Status: ' . $donationStatus);
            }
        }

        return response()->json(['message' => 'success']);
    }

    public function success(Request $request)
    {
        Log::info('Success page accessed:', $request->all());
        
        // Kashier sends parameters in the query string
        $orderId = $request->query('merchantOrderId') ?? $request->query('orderId');
          $transactionId =  null;
          $sign =  'ar';
        $sessionId = $request->query('sessionId');
        
        // Get payment details from Kashier API
        if ($sessionId) {
            try {
                
                   $donation = null;
            if ($orderId) {
                $donation = Donation::where('order_id', $orderId)->first();
                if ($donation) {
                    $this->setCredentialsByType($donation->type);
                }
            }
            
            
                $mode = config('services.kashier.mode', 'live');
                $apiUrl = $mode === 'test' 
                    ? 'https://test-api.kashier.io/v3/payment/sessions/' 
                    : 'https://api.kashier.io/v3/payment/sessions/';
                
                $response = Http::withHeaders([
                    'Authorization' => $this->secretKey,
                    'Accept' => 'application/json'
                ])->get($apiUrl . $sessionId . '/payment');
                
                if ($response->successful()) {
                    $data = $response->json();
                    $paymentData = $data['data'] ?? [];
                    
                    Log::info('Payment session details:', $paymentData);
                    
                    // Update donation if found
                    if (isset($paymentData['merchantOrderId'])) {
                        $donation = Donation::where('order_id', $paymentData['merchantOrderId'])->first();
                        
                        if ($donation) {
                            
                            $donation->update([
                                'status' => 'completed',
                                'transaction_id' => $paymentData['orderId'] ?? null,
                                'payment_method' => $paymentData['method'] ?? null,
                                'response_data' => json_encode($paymentData)
                            ]);
                        }
                    }
                    
                    $transactionId = $paymentData['orderId'] ?? null;
                }
            } catch (\Exception $e) {
                Log::error('Error fetching payment session: ' . $e->getMessage());
            }
        }
        
        return view('kashier.success', compact('orderId', 'transactionId','sign'));
    }

    public function failure(Request $request)
    {
        Log::info('Failure page accessed:', $request->all());
            $sign =  'ar';
        $orderId = $request->query('merchantOrderId') ?? $request->query('orderId');
        $reason = $request->query('message', 'حدث خطأ أثناء الدفع');
        
        if ($orderId) {
            $donation = Donation::where('order_id', $orderId)->first();
            
            if ($donation && $donation->status === 'pending') {
                $donation->update([
                    'status' => 'failed',
                    'response_data' => json_encode($request->all())
                ]);
            }
        }
        
        return view('kashier.failure', compact('orderId', 'reason','sign'));
    }
}