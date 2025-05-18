<?php

namespace App\Http\Controllers;

use App\Models\AboutPoint;
use App\Models\User;
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

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $home_services = Service::get()->take(12);
    $models = PageModel::get();
    $features = ModelCategory::get();
    $partners = Partner::get();
    $medias = Media::get();
    $after_befores = AfterBefore::get();
    $certificates = Certificate::get();
    $doctors = Doctor::get();
    $timelines = Timeline::get();
    $testimonials = Testimonial::get();
    $blogs = Blog::orderby('id','desc')->get()->take(3);

    return view('front.index', compact('sign', 'sliders','doctors','timelines','testimonials','certificates','after_befores','medias', 'features', 'points','blogs', 'home_services', 'models', 'partners'));
  }

  public function about(Request $request)
  {

    $sign = $this->langSign();

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $reviews = Partner::get();

    return view('front.about', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }

  
  public function sinaiclinic_nabq(Request $request)
  {

    $sign = $this->langSign();

    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $reviews = Partner::get();

    return view('front.sinaiclinic-nabq', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
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

 
    $blogs = Blog::orderby('blog_date','desc')->paginate(9);

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
  public function BookNow(Request $request)
  {

    $sign = $this->langSign();


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.reservation', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }
 public function contact(Request $request)
  {

    $sign = $this->langSign();


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.contact', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }

  public function singleBlog(Request $request, $slug)
  {

    $sign = $this->langSign();


    $blog = Blog::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    if(!$blog){

      abort(404);
    }

    return view('front.details-blog', compact('sign', 'blog'));
  }

  public function singleService(Request $request, $slug)
  {

    $sign = $this->langSign();


    $service = Service::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    if(!$service){

      abort(404);
    }
    return view('front.details-service', compact('sign', 'service'));
  }

  public function singleCategoryService(Request $request, $slug)
  {

    $sign = $this->langSign();
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


    $x =  str_replace('/' . $lang->sign, '/' . $data->sign, $u);


    // echo $x;

    //  return redirect($x);

    return redirect()->back();
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

    $sign = $this->langSign();


    $category = BlogCategory::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    if(!$category){

      abort(404);
    }


    return view('front.blog_categories', compact('sign', 'category'));
  }
 


}
