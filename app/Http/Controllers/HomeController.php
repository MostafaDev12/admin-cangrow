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
use App\Models\Event;
use App\Models\Partner;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Generalsetting;
use App\Models\Media;
use App\Models\AfterBefore;
use App\Models\Certificate;
use App\Models\Agenda;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Classes\GeniusMailer;
use App\Models\AboutVision;
use App\Models\Bank;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\DonateCampaign;
use App\Models\HumanitarianCase;
use App\Models\Location;
use App\Models\Party;
use App\Models\Process;
use App\Models\Project;
use App\Models\Subcategory;
use App\Models\Subscribe;
use App\Models\Subscription;
use App\Models\Testimonial;
use App\Models\Timeline;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
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
  public function index(Request $request,$lang)
  {
    // if (view()->exists($request->path())) {
    //     return view($request->path());
    // }
    // return abort(404);
    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $projects = Project::get();
    $home_services = Service::get()->take(10);
    $models = PageModel::get();
    $features = ModelCategory::get();
    $partners = Partner::get();
    $medias = Media::get()->take(3);
    $after_befores = AfterBefore::get();
$processes = Process::get();
    $doctors = Doctor::get()->take(8);
    $timelines = Timeline::get();
          $testimonials = Testimonial::get();
    $blogs = Blog::orderby('id','desc')->get()->take(3);
  $certificates = Certificate::get();
  $servicess = Service::get();
    return view('front.index', compact('sign','projects', 'sliders','doctors','testimonials','processes','certificates','timelines', 'after_befores','medias', 'features', 'points','blogs', 'home_services', 'models', 'partners', 'servicess'));
  }




  public function about(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $about_visions = AboutVision::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $teams = Doctor::get()->take(4);
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();

    return view('front.about', compact('sign', 'sliders', 'teams', 'points','about_visions','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

   

  public function our_impact(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $about_visions = AboutVision::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $teams = Doctor::get()->take(4);
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();
              $locations = Location::get();

    return view('front.our-impact', compact('sign', 'sliders', 'locations', 'points','about_visions','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

  public function associations(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $about_visions = AboutVision::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $teams = Doctor::get()->take(4);
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();
              $locations = Location::get();

    return view('front.associations', compact('sign', 'sliders', 'locations', 'points','about_visions','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

   
  public function board_trustees(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $about_visions = AboutVision::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $teams = Doctor::get();
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();
              $locations = Location::get();

    return view('front.board-trustees', compact('sign', 'teams', 'locations', 'points','about_visions','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

      
  public function achievements(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $about_visions = AboutVision::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $teams = Doctor::get();
    $achievements = AfterBefore::get();
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();
              $locations = Location::get();

    return view('front.achievements', compact('sign','achievements', 'teams', 'locations', 'points','about_visions','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

   
      
  public function certificate(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

    $sliders = Slider::get();
    $points = AboutPoint::get();
    $about_visions = AboutVision::get();
    $services = Service::get();
    $models = ModelCategory::get();
    $partners = Partner::get();
    $teams = Doctor::get();
    $achievements = AfterBefore::get();
    $processes = Process::get();
       $timelines = Timeline::get();
        $testimonials = Testimonial::get();
            $certificates = Certificate::get();
              $locations = Location::get();

    return view('front.certificate', compact('sign','achievements', 'teams', 'locations', 'points','about_visions','certificates', 'timelines','testimonials', 'processes', 'services', 'models', 'partners'));
  }

   
 

  public function reviews(Request $request,$lang)
  {

    $sign = $this->langSign($lang);
   $testimonials = Testimonial::get();
    $videos = Media::get();

    return view('front.review', compact('sign','videos','testimonials'));
  }

  public function blogs(Request $request,$lang)
  {

    $sign = $this->langSign($lang);

 
    $blogs = Blog::orderby('blog_date','desc')->paginate(9);

    return view('front.blogs', compact('sign', 'blogs'));
  }

  public function products(Request $request)
  {

    $sign = $this->langSign();


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.products', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }  
  
  public function services(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
   // $servicess = Subcategory::paginate(8);
    $servicess = Service::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
  $projects = Project::get();
   $timelines = Timeline::get();
    return view('front.services', compact('sign','timelines', 'projects','sliders', 'points', 'servicess', 'models', 'reviews'));
  }  
    public function agenda(Request $request,$lang)
  {

    $sign = $this->langSign($lang);
   
    $sliders = Slider::first();
    $points = AboutPoint::get();
   // $servicess = Subcategory::paginate(8);
    $servicess = Service::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
  $projects = Project::get();
   $timelines = Timeline::get();

         $selectedDate = \Carbon\Carbon::createFromFormat('Y-m-d', \Carbon\Carbon::now()->format('Y-m-d'));
      
      // جلب الأحداث في التاريخ المحدد
      $events = Agenda::whereDate('date', $selectedDate)->get();
      
    return view('front.agenda', compact('sign','timelines','events', 'projects','sliders', 'points', 'servicess', 'models', 'reviews'));
  }

  public function getAgendaEvents(Request $request, $date)
  {
    $sign = $this->langSign();
    
    try {
      // تحويل التاريخ من صيغة Y-m-d إلى صيغة Date
      $selectedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
      
      // جلب الأحداث في التاريخ المحدد
      $events = Agenda::whereDate('date', $selectedDate)->get();
      
      if ($events->isEmpty()) {
        return response()->json([
          'success' => false,
          'message' => __('لا توجد أحداث مجدولة في هذا التاريخ'),
          'html' => '<p class="text-center text-gray-500 py-8"> '.__('لا توجد أحداث مجدولة في هذا التاريخ').' </p>'
        ]);
      }

      $html = '';
      foreach ($events as $event) {
        $formattedDate = \Carbon\Carbon::createFromFormat('Y-m-d', $event->date)->format('d F Y');
        $html .= '<div class="bg-white rounded-lg shadow p-5 border-r-4 border-primary">';
        $html .= '<h4 class="text-lg font-semibold text-gray-800 mb-2">' . $event->{'title_' . $sign} . '</h4>';
        $html .= '<p class="text-sm text-gray-600 mb-1">📅 '. __('التاريخ').': ' . $formattedDate . '</p>';
        $html .= '<p class="text-sm text-gray-600 mb-2">📍 '.__('المكان').': ' . $event->{'location_' . $sign} . '</p>';
        $html .= '<p class="text-gray-700 text-sm leading-relaxed">' . $event->{'details_' . $sign} . '</p>';
        $html .= '</div>';
      }

      return response()->json([
        'success' => true,
        'html' => $html,
        'count' => $events->count()
      ]);

    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'خطأ في جلب البيانات',
        'html' => '<p class="text-center text-red-500 py-8">حدث خطأ في تحميل الأحداث</p>'
      ], 500);
    }
  }  
  
  public function donate_campaigns(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = DonateCampaign::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $locations = Location::get();

    return view('front.donate_campaigns', compact('sign', 'sliders', 'points', 'servicess', 'models', 'reviews'));
  }  

    
  public function singleDonate_campaigns(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = DonateCampaign::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    
    if(!$service){

      abort(404);
    }

         switch ($sign) {
        case 'en':
            $correctSlug = $service->slug_en;
            break;
        case 'ar':
            $correctSlug = $service->slug_ar;
            break;
        case 'fr':
            $correctSlug = $service->slug_fr;
            break;
        default:
            $correctSlug = $service->slug_en;
    }
    if ($slug !== $correctSlug) {
        if($lang){
            
        return redirect()->to("/$sign/donate-campaign/$correctSlug");
        }else{
            
            
        return redirect()->to("/donate-campaign/$correctSlug");
        }
    }



    return view('front.details-donate_campaigns', compact('sign', 'service'));
  }  
  public function cross_bank_donation(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = Event::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $insides = Bank::where('type','in')->get();
    $outsides = Bank::where('type','out')->get();

    return view('front.cross-bank-donation', compact('sign', 'insides', 'outsides', 'servicess', 'models', 'reviews'));
  }  

    
  public function contributions_kind(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = Event::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $insides = Bank::where('type','in')->get();
    $outsides = Bank::where('type','out')->get();

    return view('front.contributions-kind', compact('sign', 'insides', 'outsides', 'servicess', 'models', 'reviews'));
  }  

    
  public function humanitarian_cases(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = HumanitarianCase::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $insides = Bank::where('type','in')->get();
    $outsides = Bank::where('type','out')->get();

    return view('front.humanitarian_cases', compact('sign', 'insides', 'outsides', 'servicess', 'models', 'reviews'));
  }  
  public function About_volunteering(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = HumanitarianCase::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $insides = Bank::where('type','in')->get();
    $outsides = Bank::where('type','out')->get();

    return view('front.about_volunteering', compact('sign', 'insides', 'outsides', 'servicess', 'models', 'reviews'));
  }  
  public function be_volunteer(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = HumanitarianCase::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $insides = Bank::where('type','in')->get();
    $outsides = Bank::where('type','out')->get();

    return view('front.be-volunteer', compact('sign', 'insides', 'outsides', 'servicess', 'models', 'reviews'));
  }  

    
  public function stories_success_volunteers(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = HumanitarianCase::paginate(6);
    $models = PageModel::paginate(9);
    $reviews = Partner::get();
    $insides = Bank::where('type','in')->get();
    $outsides = Bank::where('type','out')->get();

    return view('front.stories-success-volunteers', compact('sign', 'insides', 'outsides', 'servicess', 'models', 'reviews'));
  }  

    
  public function events(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = Event::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $locations = Location::get();

    return view('front.events', compact('sign', 'sliders', 'points', 'servicess', 'models', 'reviews'));
  }  

    
  public function singleEvent(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = Event::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    
    if(!$service){

      abort(404);
    }

         switch ($sign) {
        case 'en':
            $correctSlug = $service->slug_en;
            break;
        case 'ar':
            $correctSlug = $service->slug_ar;
            break;
        case 'fr':
            $correctSlug = $service->slug_fr;
            break;
        default:
            $correctSlug = $service->slug_en;
    }
    if ($slug !== $correctSlug) {
        if($lang){
            
        return redirect()->to("/$sign/event/$correctSlug");
        }else{
            
            
        return redirect()->to("/event/$correctSlug");
        }
    }



    return view('front.details-event', compact('sign', 'service'));
  }
  public function parties(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $servicess = Party::paginate(6);
    $models = PageModel::get();
    $reviews = Partner::get();
    $locations = Location::get();

    return view('front.parties', compact('sign', 'sliders', 'points', 'servicess', 'models', 'reviews'));
  }  

    
  public function singleParty(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = Party::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    
    if(!$service){

      abort(404);
    }

         switch ($sign) {
        case 'en':
            $correctSlug = $service->slug_en;
            break;
        case 'ar':
            $correctSlug = $service->slug_ar;
            break;
        case 'fr':
            $correctSlug = $service->slug_fr;
            break;
        default:
            $correctSlug = $service->slug_en;
    }
    if ($slug !== $correctSlug) {
        if($lang){
            
        return redirect()->to("/$sign/party/$correctSlug");
        }else{
            
            
        return redirect()->to("/party/$correctSlug");
        }
    }



    return view('front.details-party', compact('sign', 'service'));
  }
  public function locations(Request $request)
  {

    $sign = $this->langSign();


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();
    $locations = Location::get();

    return view('front.locations', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }
  public function privacy(Request $request)
  {

    $sign = $this->langSign();


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.privacy', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }
 public function contact(Request $request,$lang)
  {

    $sign = $this->langSign($lang);


    $sliders = Slider::first();
    $points = AboutPoint::get();
    $services = Service::get();
    $models = PageModel::get();
    $reviews = Partner::get();

    return view('front.contact', compact('sign', 'sliders', 'points', 'services', 'models', 'reviews'));
  }

  public function singleBlog(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


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
    if ($slug !== $correctSlug) {
        if($lang){
            
        return redirect()->to("/$sign/$correctSlug");
        }else{
            
            
        return redirect()->to("/$correctSlug");
        }
    }

    return view('front.details-blog', compact('sign', 'blog'));
  }

  public function singleProduct(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = Service::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    if(!$service){

      abort(404);
    }


    return view('front.details-product', compact('sign', 'service'));
  } 
  
  public function singleService(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = Service::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    
    if(!$service){

      abort(404);
    }

         switch ($sign) {
        case 'en':
            $correctSlug = $service->slug_en;
            break;
        case 'ar':
            $correctSlug = $service->slug_ar;
            break;
        case 'fr':
            $correctSlug = $service->slug_fr;
            break;
        default:
            $correctSlug = $service->slug_en;
    }
    if ($slug !== $correctSlug) {
        if($lang){
            
        return redirect()->to("/$sign/service/$correctSlug");
        }else{
            
            
        return redirect()->to("/service/$correctSlug");
        }
    }



    return view('front.details-service', compact('sign', 'service'));
  }
  public function singleCategory(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = Category::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();
    if(!$service){

      abort(404);
    }
    return view('front.services', compact('sign', 'service'));
  }  
  
  public function singleModelCategory(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);


    $service = ModelCategory::where('id', $slug)->first();
    if(!$service){

      abort(404);
    }
    return view('front.references', compact('sign', 'service'));
  }
  public function gallery(Request $request,$lang)
  {

    $sign = $this->langSign($lang);
 
  $images = Media::whereNull('youtube_url')->get();
  $videos = Media::whereNotNull('youtube_url')->get();
    return view('front.gallery', compact('sign','images'));
  }
  public function success_volunteers(Request $request,$lang)
  {

    $sign = $this->langSign($lang);
  $models = PageModel::paginate(6);
  $images = Media::whereNull('youtube_url')->get();
  $videos = Media::whereNotNull('youtube_url')->get();

    return view('front.stories-success-volunteers', compact('sign','models'));
  }

  public function singleCategoryService(Request $request,$lang, $slug)
  {

    $sign = $this->langSign($lang);
    $category = Category::where('slug_ar', $slug)->orwhere('slug_en',$slug)
     ->orwhere('slug_fr',$slug)->first();

    
    if(!$category){

      abort(404);
    }
     $servicess  = $category->parentServices()->paginate(8);
    return view('front.category', compact('sign', 'category','servicess'));
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
dd($id);
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

   // return redirect()->back();

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
return redirect($newUrl);

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
    //  "<br>Email: " . $from . 
      "<br>Phone: " . $phone . 
      // "<br>Age: " . $request->age . 
      // "<br>Specialty: " . $request->specialty . 
      // "<br>BookingDate: " . $request->bookingDate . 
    
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

    $sign = $this->langSign();


    $category = BlogCategory::where('slug_ar', $slug)->orwhere('slug_en', $slug)->orwhere('slug_fr', $slug)->first();

    if(!$category){

      abort(404);
    }


    return view('front.blog_categories', compact('sign', 'category'));
  }
 
  public function home_data()
    {
       $city = request('city', 'Cairo');
        $country = request('country', 'Egypt');
      
        $openWeatherKey = env('OPENWEATHER_KEY');

        return Cache::remember("home_data4_{$city}_{$country}", 3600, function () use ($city, $country, $openWeatherKey) {

            // =======================
            // 1) مواقيت الصلاة
            // =======================
            $prayer = Http::get("https://api.aladhan.com/v1/timingsByCity", [
                'city' => $city,
                'country' => $country,
                'method' => 5
            ]);

            $prayerData = $prayer->successful() ? $prayer['data']['timings'] : null;

            // =======================
            // 3) القرآن – سورة الفاتحة
            // =======================
            $quran = Http::get("https://api.alquran.cloud/v1/surah/1");

            $quranData = $quran->successful() ? [
                'surah_name' => $quran['data']['englishName'],
                'ayahs'      => $quran['data']['ayahs'],
                'audio'      => "https://cdn.islamic.network/quran/audio-surah/128/ar.alafasy/1.mp3"
            ] : null;

            // =======================
            // 2) الطقس
            // =======================
            
            // $weather = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            //     'q' => $city,
            //     'appid' => $openWeatherKey,
            //     'units' => 'metric',
            // ]);
        
            $weather = Http::withHeaders([
                'User-Agent' => 'MyWeatherApp/1.0 (mostafahamdi235@gmail.com)' // ضع اسم تطبيقك وبريدك
            ])->get("https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=30.0444&lon=31.2357");

            $weatherData = $weather->successful() ? [
               
                'temp'      => $weather['properties']['timeseries'][0]['data']['instant']['details']['air_temperature'],
                'humidity'  => $weather['properties']['timeseries'][0]['data']['instant']['details']['relative_humidity'],
                'wind'      => $weather['properties']['timeseries'][0]['data']['instant']['details']['wind_speed'],
                'desc'      => $weather['properties']['timeseries'][0]['data']['next_1_hours']['summary']['symbol_code'],
            ] : null;

            return [
                'prayer'  => $prayerData,
                'weather' => $weatherData,
                'quran'   => $quranData,
            ];
        });
    }
  public function prayer_data()
    {
       $city = request('city', 'Cairo');
        $country = request('country', 'Egypt');
      
        return Cache::remember("prayer_data_{$city}_{$country}", 3600, function () use ($city, $country) {

            // =======================
            // 1) مواقيت الصلاة
            // =======================
            $prayer = Http::get("https://api.aladhan.com/v1/timingsByCity", [
                'city' => $city,
                'country' => $country,
                'method' => 5
            ]);
 
            $prayerData = $prayer->successful() ? $prayer['data']['timings'] : null;

          

            return [
                'prayer'  => $prayerData,
              
            ];
        });
    }


    // ============================================
    // سورة حسب اختيار المستخدم (استدعاء عند الضغط)
    // ============================================
    public function getSurah($surah, $reciter = 'ar.alafasy')
    { 
     
            return Cache::remember("surah_{$surah}", 86400, function () use ($surah,$reciter) {

            $quran = Http::get("https://api.alquran.cloud/v1/surah/$surah");

            if ($quran->failed()) return ['error' => 'Surah not found'];
              
            return [
                'surah_name' => $quran['data']['name'],
                'english_name' => $quran['data']['englishName'],
                'ayahs' => $quran['data']['ayahs'],
                'audio' => "https://cdn.islamic.network/quran/audio-surah/128/$reciter/$surah.mp3",
                'ayah_audio_base' => "https://cdn.islamic.network/quran/audio/128/$reciter/"
            ];
        });
    }
 
  public function weather_data()
    {
        $city = request('city', 'Cairo');
        $latitude =  request('latitude', '30.0444');
        $longitude =  request('longitude', '31.2357');
 
        return Cache::remember("weather_data6_{$city}", 3600, function () use ($city,$latitude,$longitude) {

          $weather = Http::withHeaders([
              'User-Agent' => 'MyWeatherApp/1.0 (mostafahamdi235@gmail.com)' // ضع اسم تطبيقك وبريدك
          ])->get("https://api.met.no/weatherapi/locationforecast/2.0/compact?lat=$latitude&lon=$longitude");

        //     dd($weather->body());
            $weatherData = $weather->successful() ? [
               
                'temp'      => $weather['properties']['timeseries'][0]['data']['instant']['details']['air_temperature'],
                'humidity'  => $weather['properties']['timeseries'][0]['data']['instant']['details']['relative_humidity'],
                'wind'      => $weather['properties']['timeseries'][0]['data']['instant']['details']['wind_speed'],
                'desc'      => $weather['properties']['timeseries'][0]['data']['next_1_hours']['summary']['symbol_code'],
            ] : null;

            return [
                 
                'weather' => $weatherData,
              
            ];
        });
    }
}
