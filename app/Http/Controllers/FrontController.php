<?php

namespace App\Http\Controllers;

use App\Product;
use App\Service;
use App\Setting;
use App\Team;
use App\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index(){
        $settings = Setting::first();
        $services = Service::latest()->where('status',1)->take(6)->get();
        $acttesti = Testimonial::latest()->where('status',1)->first();
        $testimonials = Testimonial::latest()->where('status',1)->take(5)->get();
        return view('frontend.index',compact('settings', 'services', 'acttesti', 'testimonials'));
    }
    public function about(){
        $settings = Setting::first();
        $teams = Team::latest()->where('status',1)->get();
        return view('frontend.about', compact('settings', 'teams'));
    }
    public function services(){
        $settings = Setting::first();
        $services = Service::latest()->where('status',1)->paginate(6);
        return view('frontend.services',compact('settings', 'services'));
    }
    public function singleservice($slug){
        $settings = Setting::first();
        $service = Service::where('slug', $slug)->first();
        return view('frontend.singleservice', compact('settings', 'service'));
    }
    public function products(){
        $settings = Setting::first();
        $products=Product::latest()->where('status',1)->paginate(
        );
        return view('frontend.products', compact('settings', 'products'));
    }
    public function singleproduct($slug){
        $settings = Setting::first();
        $product = Product::where('slug', $slug)->first();
        return view('frontend.singleproduct', compact('settings', 'product'));
    }
    public function contact(){
        $settings = Setting::first();
        return view('frontend.contact', compact('settings'));
    }
}
