<?php

namespace App\Http\Controllers;

use App\Models\AboutPoint;
use App\Models\User;
use App\Models\Language;
use App\Models\PageModel;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Generalsetting;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Classes\GeniusMailer;
use App\Models\Blog;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    // $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index(Request $request)
  {
    // if (view()->exists($request->path())) {
    //     return view($request->path());
    // }
    // return abort(404);
    $sign = $this->langSign();

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.index', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }

  public function about(Request $request)
  {

    $sign = $this->langSign();

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.about', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }
  public function videos(Request $request)
  {

    $sign = $this->langSign();

    $videos = Media::get();

    return view('front.videos', compact('sign','videos'));
  }

  public function blogs(Request $request)
  {

    $sign = $this->langSign();

 
    $blogs = Blog::get();

    return view('front.blogs', compact('sign', 'blogs'));
  }

  public function services(Request $request)
  {

    $sign = $this->langSign();


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.services', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }

  public function singleBlog(Request $request, $slug)
  {

    $sign = $this->langSign();


    $blog = Blog::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    return view('front.details-blog', compact('sign', 'blog'));
  }

  public function singleService(Request $request, $slug)
  {

    $sign = $this->langSign();


    $service = Service::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    return view('front.details-service', compact('sign', 'service'));
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


    $x =  str_replace('/' . $lang->sign, '/' . $data->sign, $u);


    // echo $x;

    //  return redirect($x);

    return redirect()->back();
  }


  public function contactemail(Request $request)
  {
    $gs = Generalsetting::findOrFail(1);
    $ps = DB::table('pagesettings')->find(1);

    if ($gs->is_capcha == 1) {

      // Capcha Check
      $value = session('captcha_string');
      if ($request->codes != $value) {
        return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
      }
    }


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

      $msg = "Name: " . $name . "\nEmail: " . $from . "\nPhone: " . $phone . "\nJob: " . $job . "\nSubject: " . $subject_title . "\nMessage: " . $message;
    
    } elseif (!empty($request->service)) {

      $subject = "Contact Email From Of " . $request->name;
      $subject_title = $request->service;
      $msg = "Name: " . $name .
        "\nEmail: " . $from .
        "\nService: " . $service .
        "\nMessage: " . $message;
    } else {

      $subject = "Email From Of " . $request->name;

      $msg = "Name: " . $name . "\nEmail: " . $from . "\nPhone: " . $phone . "\nSubject: " . $subject_title . "\nMessage: " . $message;
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
 
    Contact::create([
      'name' => $name,
      'phone' => $phone,
      'email' => $from,
      'subject' => $subject_title,
      'message' => $message,
    ]);
    // Redirect Section
    return response()->json($ps->contact_success);
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



}
