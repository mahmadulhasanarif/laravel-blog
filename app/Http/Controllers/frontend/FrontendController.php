<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ContactForm;
use App\Models\Feature;
use App\Models\MultiImage;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $sliders = Slider::latest()->get();
        $abouts = About::latest()->first();
        $services = Service::latest()->get();
        $images = MultiImage::latest()->get();
        return view('frontend.home', compact('brands', 'sliders', 'abouts', 'services', 'images'));
    }

    public function protfolio()
    {
        $images = MultiImage::latest()->get();
        return view('frontend.protfolio', compact('images'));
    }

    public function service()
    {
        $services = Service::latest()->get();
        $features = Feature::latest()->get();
        return view('frontend.service', compact('services', 'features'));
    }

    public function about()
    {
        $teams = Team::latest()->get();
        $brands = Brand::latest()->get();
        $about = About::latest()->first();
        return view('frontend.about', compact('about','teams','brands'));
    }

    public function team()
    {
        $teams = Team::latest()->get();
        return view('frontend.team', compact('teams'));
    }

    public function testimonial()
    {
        $teams = Team::latest()->get();
        return view('frontend.testimonial', compact('teams'));
    }

    public function blog()
    {
        $category = Category::latest()->get();
        $services = Service::latest()->get();
        $blogs = Blog::latest()->paginate(5);
        return view('frontend.blog', compact('blogs', 'category', 'services'));
    }
    public function blogDetails($id)
    {
        $blogs = Blog::latest()->get();
        $category = Category::latest()->get();
        $services = Service::latest()->get();
        $blog = Blog::find($id);
        return view('frontend.blog_details', compact('blog','category','services','blogs'));
    }

    public function contact()
    {
        $contact = DB::table('contacts')->first();
        return view('frontend.contact', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        ContactForm::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()
        ]);

        Session::flash('message', 'Message Send Successfully');
        return redirect()->route('contact');
    }

    public function pricing()
    {
        return view('frontend.pricing');
    }
}
