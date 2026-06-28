<?php

namespace App\Http\Controllers;

use App\Models\AboutPoint;
use App\Models\User;
use App\Models\Counter;
use App\Models\Doctor;
use App\Models\Language;
use App\Models\PageModel;
use App\Models\ModelCategory;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Generalsetting;
use App\Models\Media;
use App\Models\AfterBefore;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Classes\GeniusMailer;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Process;
use App\Models\Subscribe;
use App\Models\Subscription;
use App\Models\Testimonial;
use App\Models\Timeline;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
   
   
//   public function __construct()
//   {
     
//     if (isset($_SERVER['HTTP_REFERER'])) {
//       $referral = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);
//       if ($referral != $_SERVER['SERVER_NAME']) {

//         $brwsr = Counter::where('type', 'browser')->where('referral', $this->getOS());
//         if ($brwsr->count() > 0) {
//           $brwsr = $brwsr->first();
//           $tbrwsr['total_count'] = $brwsr->total_count + 1;
//           $brwsr->update($tbrwsr);
//         } else {
//           $newbrws = new Counter();
//           $newbrws['referral'] = $this->getOS();
//           $newbrws['type'] = "browser";
//           $newbrws['total_count'] = 1;
//           $newbrws->save();
//         }

//         $count = Counter::where('referral', $referral);
//         if ($count->count() > 0) {
//           $counts = $count->first();
//           $tcount['total_count'] = $counts->total_count + 1;
//           $counts->update($tcount);
//         } else {
//           $newcount = new Counter();
//           $newcount['referral'] = $referral;
//           $newcount['total_count'] = 1;
//           $newcount->save();
//         }
//       }
//     } else {
//       $brwsr = Counter::where('type', 'browser')->where('referral', $this->getOS());
//       if ($brwsr->count() > 0) {
//         $brwsr = $brwsr->first();
//         $tbrwsr['total_count'] = $brwsr->total_count + 1;
//         $brwsr->update($tbrwsr);
//       } else {
//         $newbrws = new Counter();
//         $newbrws['referral'] = $this->getOS();
//         $newbrws['type'] = "browser";
//         $newbrws['total_count'] = 1;
//         $newbrws->save();
//       }
//     }
//   }

  function getOS()
  {

    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
      '/windows nt 10/i'     =>  'Windows 10',
      '/windows nt 6.3/i'     =>  'Windows 8.1',
      '/windows nt 6.2/i'     =>  'Windows 8',
      '/windows nt 6.1/i'     =>  'Windows 7',
      '/windows nt 6.0/i'     =>  'Windows Vista',
      '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
      '/windows nt 5.1/i'     =>  'Windows XP',
      '/windows xp/i'         =>  'Windows XP',
      '/windows nt 5.0/i'     =>  'Windows 2000',
      '/windows me/i'         =>  'Windows ME',
      '/win98/i'              =>  'Windows 98',
      '/win95/i'              =>  'Windows 95',
      '/win16/i'              =>  'Windows 3.11',
      '/macintosh|mac os x/i' =>  'Mac OS X',
      '/mac_powerpc/i'        =>  'Mac OS 9',
      '/linux/i'              =>  'Linux',
      '/ubuntu/i'             =>  'Ubuntu',
      '/iphone/i'             =>  'iPhone',
      '/ipod/i'               =>  'iPod',
      '/ipad/i'               =>  'iPad',
      '/android/i'            =>  'Android',
      '/blackberry/i'         =>  'BlackBerry',
      '/webos/i'              =>  'Mobile'
    );

    foreach ($os_array as $regex => $value) {

      if (preg_match($regex, $user_agent)) {
        $os_platform    =   $value;
      }
    }
    return $os_platform;
  }


  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
   public function removeTrailingSlash($html)
{
    return preg_replace_callback('/href="([^"]+)"/i', function ($matches) {
        $url = $matches[1];

        // نفصل الـ query أو hash لو موجود
        preg_match('/^([^?#]*)(.*)$/', $url, $parts);
        $base = $parts[1];
        $rest = $parts[2] ?? '';

        // نستخدم rtrim لإزالة الـ / من نهاية الجزء الأساسي فقط
        $base = rtrim($base, '/');

        return 'href="' . $base . $rest . '"';
    }, $html);
}
  public function fixLinks($html)
{
    return preg_replace_callback('/href="([^"]+)"/i', function ($matches) {
        $url = $matches[1];

        // نفصل الـ query أو hash لو موجود
        preg_match('/^([^?#]*)(.*)$/', $url, $parts);
        $base = $parts[1];
        $rest = $parts[2] ?? '';

        // لو مش منتهي بـ /
        if (!str_ends_with($base, '/')) {
            $base .= '/';
        }

        return 'href="' . $base . $rest . '"';
    }, $html);
   }

  
 function fixLang($content,$lang) {
    return preg_replace(
        '/href="https:\/\/innovadentalclinics\.com\/(?!'.$lang.'\/)([^"]*)"/',
        'href="https://innovadentalclinics.com/'.$lang.'/$1"',
        $content
    );
}


  
  public function update_blogs()
    {
        
        // dd(123);
    
    $blogs = Blog::orderby('id','desc')->get();
    
    foreach($blogs as $blog){
     
    $details_en = $this->removeTrailingSlash($blog->details_en);
    $details_ar = $this->removeTrailingSlash($blog->details_ar);
    
    
    $blog->details_en = $details_en;
    $blog->details_ar = $details_ar;
    
    $blog->update();
    
    
    }
    echo 'done';
     }



  public function index(Request $request)
  {
    // if (view()->exists($request->path())) {
    //     return view($request->path());
    // }
    // return abort(404);
    $sign = app()->getLocale(); 
    $sliders = Slider::get();
    $points = AboutPoint::get();
    $home_services = Service::get()->take(10);
    $models = PageModel::get();
    $features = ModelCategory::get();
    $partners = Partner::get();
    $medias = Media::get();
    $after_befores = AfterBefore::get();

    $doctors = Doctor::get()->take(8);
    $timelines = Timeline::get();
    $testimonials = Testimonial::get();
    $blogs = Blog::orderby('id','desc')->get()->take(3);
  $certificates = Certificate::get();
    return view('front.index', compact('sign', 'sliders','doctors','certificates','timelines','testimonials','after_befores','medias', 'features', 'points','blogs', 'home_services', 'models', 'partners'));
  }

  public function about(Request $request)
  {

    $sign = app()->getLocale(); 

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();

    return view('front.about', compact('sign', 'sliders', 'points','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

  
  public function dentistry(Request $request)
  {

   $sign = app()->getLocale(); 
    $sliders = Slider::first();
    $points = AboutPoint::get();
    $child_services = Service::where('parent_id','!=',0)->get();
    $models = ModelCategory::get();
    $reviews = Partner::get();
        $testimonials = Testimonial::get();


    return view('front.dentistry', compact('sign', 'sliders', 'points', 'child_services', 'models', 'reviews', 'testimonials'));
  }

  
  public function invisalign(Request $request)
  {

    $sign = app()->getLocale(); 

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $child_services = Service::where('parent_id','!=',0)->get();
    $models = ModelCategory::get();
    $reviews = Partner::get();
 $after_befores = AfterBefore::get();
    return view('front.invisalign', compact('sign', 'after_befores', 'sliders', 'points', 'child_services', 'models', 'reviews'));
  }

  public function dental_implants(Request $request)
  {

    $sign = app()->getLocale(); 

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $child_services = Service::where('parent_id','!=',0)->get();
    $models = ModelCategory::get();
    $reviews = Partner::get();
 $after_befores = AfterBefore::get();
    return view('front.dental-implants', compact('sign', 'after_befores', 'sliders', 'points', 'child_services', 'models', 'reviews'));
  }

 
  public function veneers(Request $request)
  {

    $sign = app()->getLocale(); 

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $child_services = Service::where('parent_id','!=',0)->get();
    $models = ModelCategory::get();
    $reviews = Partner::get();
 
  $processes = Process::get();
   $after_befores = PageModel::get();
    return view('front.veneers', compact('sign', 'processes', 'after_befores', 'sliders', 'points', 'child_services', 'models', 'reviews'));
  }

 
  public function doctors(Request $request)
  {

    $sign = app()->getLocale(); 
 
    $points = AboutPoint::get();
    $services = Service::where('parent_id','!=',0)->get();
    $models = ModelCategory::get();
    $reviews = Partner::get();
    $doctors = Doctor::get();

    return view('front.doctors', compact('sign', 'doctors', 'points', 'services', 'models', 'reviews'));
  }


  public function videos(Request $request)
  {

    $sign = app()->getLocale(); 

    $videos = Media::get();

    return view('front.videos', compact('sign','videos'));
  }

  public function blogs(Request $request)
  {

$sign = app()->getLocale(); 
 
    $blogs = Blog::orderby('blog_date','desc')->paginate(9);

    return view('front.blogs', compact('sign', 'blogs'));
  }

  public function services(Request $request)
  {

    $sign = app()->getLocale(); 


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.services', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }
//   تعديل
  
  public function medicalTourism(Request $request)
{
    $sign = app()->getLocale();

    return view('front.medical-tourism', compact('sign'));
} 
  //   تعديل

  public function BookNow(Request $request)
  {

$sign = app()->getLocale(); 

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.reservation', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }
 public function contact(Request $request)
  {

$sign = app()->getLocale(); 


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.contact', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }

  public function singleBlog(Request $request , $slug)
  {

    $sign = app()->getLocale(); 


    $blog = Blog::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    if(!$blog){

      abort(404);
    }
    
    
        switch ($sign) {
            case 'en':
                $correctSlug = $blog->slug_en;
                break;
            case 'ar':
                $correctSlug = $blog->slug_ar;
                break;
            case 'fr':
                $correctSlug = $blog->slug_fr;
                break;
            default:
                $correctSlug = $blog->slug_en;
        }
    
        // If slug in URL does not match the correct one, redirect
        if ($slug !== $correctSlug) {
            return redirect()->to("/$sign/$correctSlug");
        }

    return view('front.details-blog', compact('sign', 'blog'));
  }

  public function singleService(Request $request, $slug)
  {

    $sign = app()->getLocale(); 



    $service = Service::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    if(!$service){

      abort(404);
    }
    return view('front.details-service', compact('sign', 'service'));
  }

  public function singleCategoryService(Request $request, $slug)
  {

    $sign = app()->getLocale(); 
    $category = Category::where('slug_ar', $slug)->orwhere('slug_en',$slug)
     ->orwhere('slug_fr',$slug)->first();

    if(!$category){

      abort(404);
    }
    return view('front.category', compact('sign', 'category'));
  }

  public function root()
  {
    return view('index');
  }

  /*Language Translation*/
  public function lang($locale)
  {
    if ($locale) {
      App::setLocale($locale);
      Session::put('lang', $locale);
      Session::save();
      return redirect()->back()->with('locale', $locale);
    } else {
      return redirect()->back();
    }
  }



  public function langSign($sign = null)
  {
    if (empty($sign)) {

      $sign =  Session::get('sign');

      if (!$sign) {

        $lang =  Language::where('is_default', '=', 1)->first();

        session(['front_language' => $lang->name]);
        session(['front_language_photo' => $lang->photo]);
        $language_duraction = $lang->rtl == 1 ? 'rtl' :  'ltr';
        session(['front_language_duraction' => $language_duraction]);
        session(['sign' => $lang->sign]);
        App::setlocale($lang->name);

        $sign = $lang->sign;
      }

      return $sign;
    }

    $lang = Language::where('sign', '=', $sign)->first();

    if ($lang) {


      session(['front_language' => $lang->name]);
      session(['front_language_photo' => $lang->photo]);
      session(['sign' => $lang->sign]);
      $language_duraction = $lang->rtl == 1 ? 'rtl' :  'ltr';
      session(['front_language_duraction' => $language_duraction]);
      App::setlocale($lang->name);

      $sign = $lang->sign;
    } else {

      $lang =  Language::where('is_default', '=', 1)->first();

      session(['front_language' => $lang->name]);
      session(['front_language_photo' => $lang->photo]);
      $language_duraction = $lang->rtl == 1 ? 'rtl' :  'ltr';
      session(['front_language_duraction' => $language_duraction]);
      session(['sign' => $lang->sign]);
      App::setlocale($lang->name);

      $sign = $lang->sign;
    }

    return $sign;
  }



  public function change($id)
  {

    $data = Language::findOrFail($id);

    App::setlocale($data->name);


    $lang  = Language::where('name', '=', Session::get('front_language'))->first();


    session(['front_language' => $data->name]);
    session(['front_language_photo' => $data->photo]);
    $language_duraction = $data->rtl == 1 ? 'rtl' :  'ltr';
    session(['front_language_duraction' => $language_duraction]);

    session(['sign' => $data->sign]);

    $u =  url()->previous();


   // $x =  str_replace('/' . $lang->sign, '/' . $data->sign, $u);


    // echo $x;

    //  return redirect($x);

 //   return redirect()->back();
 
 // Parse the URL
$parsedUrl = parse_url($u);
$path = $parsedUrl['path'] ?? '/';

// Split path into segments
$segments = explode('/', trim($path, '/'));

// Replace the first segment if it matches old language sign
if (!empty($segments[0]) && $segments[0] === $lang->sign) {
    $segments[0] = $data->sign;
} else {
    // If no language in URL, just prepend new one
    array_unshift($segments, $data->sign);
}

// Build new URL
$newPath = implode('/', $segments);
$newUrl = url($newPath);

// Redirect
    return redirect($newUrl, 301);
  }


  public function contactemail(Request $request)
  {
    $gs = Generalsetting::findOrFail(1);
    $ps = DB::table('pagesettings')->find(1);

    // if ($gs->is_capcha == 1) {

    //   // Capcha Check
    //   $value = session('captcha_string');
    //   if ($request->codes != $value) {
    //     return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
    //   }
    // }


    // Login Section
    $ps = DB::table('pagesettings')->where('id', '=', 1)->first();

    $name = $request->name;
    $phone = $request->phone;
    $reservation = $request->reservation;
    $service = $request->service;
    $from = $request->email;
    $message = $request->text;
    $subject_title = $request->subject;


    if (!empty($request->reservation)) {

      $subject = "Reservation From Of " . $request->name;
      $service = $request->specialty;
      $msg = "Name: " . $name . 
      "<br>Email: " . $from . 
      "<br>Phone: " . $phone . 
      "<br>Age: " . $request->age . 
      "<br>Specialty: " . $request->specialty . 
      "<br>BookingDate: " . $request->bookingDate . 
    
      "<br>Message: " . $message;
    
    } elseif (!empty($request->service)) {

      $subject = "Contact Email From Of " . $request->name;
      $subject_title = $request->service;
      $msg = "Name: " . $name .
        "<br>Email: " . $from .
        "<br>Service: " . $service .
        "<br>Message: " . $message;
    } else {

      $subject = "Email From Of " . $request->name;
      $service = $request->specialty;
      $msg = "Name: " . $name . 
      "<br>Email: " . $from . 
      "<br>Phone: " . $phone . 
      "<br>Age: " . $request->age . 
      "<br>Specialty: " . $request->specialty . 
      "<br>BookingDate: " . $request->bookingDate . 
    
      "<br>Message: " . $message;

    }

    if (!empty($gs->contact_emails)) {


      $to =    explode(',', $gs->contact_emails);




      foreach ($to as $key => $data1) {


      if ($gs->is_smtp == 1) { 
          $data = [
            'to' => $to[$key],
            'subject' => $subject,
            'body' => $msg,
          ];

          $mailer = new GeniusMailer();
          $mailer->sendCustomMail($data);
         } else {
          $headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
          mail($to[$key], $subject, $msg, $headers);
        }
        // Login Section Ends


      }
    }
 
    Contact::create( [
      'name' => $name,
      'phone' => $phone,
      'email' => $from,
      'service' => $service ?? '',
      'booking_date' => $request->bookingDate ?? '',
      'age' => $request->age ?? '',
      'message' => $message,
    ]);
    // Redirect Section
    return response()->json(__('submit success'));
  }
  
 public function subscribe(Request $request)
    {
        $subs = Subscription::where('email','=',$request->email)->first();
        if(isset($subs)){
        return response()->json(array('errors' => [ 0 =>  'This Email Has Already Been Taken.']));
        }
        $subscribe = new Subscription;
        $subscribe->fill($request->all());
        $subscribe->save();
        return response()->json('You Have Subscribed Successfully.');
    }
  public function refresh_code()
  {

    $this->code_image();
    return "done";
  }

  private function  code_image()
  {
    $actual_path = str_replace('public', '', base_path());
    $image = imagecreatetruecolor(200, 50);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

    $pixel = imagecolorallocate($image, 0, 0, 255);
    for ($i = 0; $i < 500; $i++) {
      imagesetpixel($image, rand() % 200, rand() % 50, $pixel);
    }

  // $font = $actual_path . 'admin/fronts/fonts/NotoSans-Bold.ttf';
    // $font = $actual_path . '/public/admin/fonts/crypto-icons/cryptocoins.ttf';
     $font = resource_path().'/fonts/NotoSans-Bold.ttf';

   //   dd($font);
    //$allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $allowed_letters = '0123456789';
    $length = strlen($allowed_letters);
    $letter = $allowed_letters[rand(0, $length - 1)];
    $word = '';
    //$text_color = imagecolorallocate($image, 8, 186, 239);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $cap_length = 6; // No. of character in image
    for ($i = 0; $i < $cap_length; $i++) {
      $letter = $allowed_letters[rand(0, $length - 1)];
      imagettftext($image, 25, 1, 35 + ($i * 25), 35, $text_color, $font, $letter);
      $word .= $letter;
    }
    $pixels = imagecolorallocate($image, 8, 186, 239);
    for ($i = 0; $i < 500; $i++) {
      imagesetpixel($image, rand() % 200, rand() % 50, $pixels);
    }
    session(['captcha_string' => $word]);
    imagepng($image, $actual_path . "/public/assets/images/capcha_code.png");
  }


  public function import_xml()
  {
 
    $xmlPath = public_path('build/WordPress.2025-04-24.xml'); // Adjust the path as needed

    $content = file_get_contents($xmlPath);

    // إزالة الأحرف غير المسموح بها في XML (زي null characters)
    $cleanContent = preg_replace('/[^\x09\x0A\x0D\x20-\xFF]/', '', $content);

  //  $xml = simplexml_load_file($cleanContent, 'SimpleXMLElement', LIBXML_NOCDATA);

         
  $xml = simplexml_load_string($cleanContent, 'SimpleXMLElement', LIBXML_NOCDATA);

  if ($xml === false) {
      foreach (libxml_get_errors() as $error) {
          echo "Error: ", $error->message;
      }
  }
    $namespaces = $xml->getNamespaces(true);
    $data = [] ;
    foreach ($xml->channel->item as $item) {
      $title = (string) $item->title;
      $link = (string) $item->link;
      $pubDate = (string) $item->pubDate;
      $content = isset($item->children($namespaces['content'])->encoded) ? (string) $item->children($namespaces['content'])->encoded : null;



      $slug = (string) $item->children($namespaces['wp'])->post_name ;
      $slug = urldecode($slug);
      $postDate = isset($item->children($namespaces['wp'])->post_date) ? (string) $item->children($namespaces['wp'])->post_date : null;
  
      // Convert date format if needed
      $dateToInsert = $postDate ?? date('Y-m-d H:i:s', strtotime($pubDate));
       $plainTextContent = strip_tags($content); // Remove HTML tags


       $wordCount = count(preg_split('/\s+/u', trim($plainTextContent), -1, PREG_SPLIT_NO_EMPTY));
     
       // 1st step
      //  if ($wordCount < 50) {
      //      continue; // Skip this item if it has less than 50 words
      //  }


    // Extract first 100 words while maintaining sentence structure
    $wordsArray = preg_split('/\s+/', trim($plainTextContent)); // Split into words
    $shortContent = implode(' ', array_slice($wordsArray, 0, 50));


       // **Handle Image Download**
       $imageUrl = isset($item->children($namespaces['wp'])->attachment_url) ? (string) $item->children($namespaces['wp'])->attachment_url : null;
       $imageName = null;
   
       if ($imageUrl) {
           $imageName = basename(parse_url($imageUrl, PHP_URL_PATH)); // Extract filename with extension
           $imagePath = public_path('assets/images/blogs/' . $imageName); // Define storage path
   
           // Download the image if it doesn't exist
           if (!File::exists($imagePath)) {
               try {
                   $imageData = file_get_contents($imageUrl);
                   File::put($imagePath, $imageData);
               } catch (\Exception $e) {
                   \Log::error("Failed to download image: " . $imageUrl);
                   $imageName = null; // Set to null if download fails
               }
           }
       }

        // 2nd step
      else{

        continue;

       }
 
       if(empty($imageName)){

         continue;

       }

      // Insert into the database
   
    // 2nd step

      $blog = Blog::where('title_ar', $title)->first();

    if($blog){

   $data[] = [
          'title' => $title,
          'content' => $content,
          'slug' => $slug,
          'published_at' => $dateToInsert, // Adjust column name if necessary
          'created_at' => now(),
          'updated_at' => now(),
      ];
      
      $blog->photo = $imageName ;
      $blog->update() ;

    }

  // 1st step

    //   DB::table('blogs')->insert([
    //     'title_ar' => $title,
    //     'title_en' => $title,
    //     'meta_title_ar' => $title,
    //     'meta_title_en' => $title,
    //     'details_ar' => $content,
    //     'details_en' => $content,
    //     'slug_ar' => $slug,
    //     'slug_en' => $slug,
    //     'photo' => $imageName,
    //     'short_details_ar' => $shortContent, // Ensure your blogs table has a 'content' column
    //     'short_details_en' => $shortContent, // Ensure your blogs table has a 'content' column
    //     'meta_details_ar' => $shortContent, // Ensure your blogs table has a 'content' column
    //     'meta_details_en' => $shortContent, // Ensure your blogs table has a 'content' column
    //     'blog_date' => $dateToInsert
    // ]);


    
  }
     dd($data);
    


    return "done";
  }


  
  public function blogsCategory(Request $request, $slug)
  {

    $sign = app()->getLocale(); 


    $category = BlogCategory::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    if(!$category){

      abort(404);
    }


    return view('front.blog_categories', compact('sign', 'category'));
  }
 
  
  public function change_data(Request $request)
  {

    $blogs = Blog::get();
    
    foreach($blogs as $blog){
        
       
        $blog->details_ar = preg_replace(
        '#https://innovadentalclinics\.com/ar(?!/)#',
        'https://innovadentalclinics.com/ar/',
        $blog->details_ar
    );

    $blog->save();
    }
 

    return 'done';
  }
 


}
