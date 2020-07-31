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
        $services = Service::latest()->where('status',1)->take(3)->get();
        $acttesti = Testimonial::latest()->where('status',1)->first();
        $testimonials = Testimonial::latest()->where('status',1)->take(5)->get();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.index',compact('settings', 'services', 'acttesti', 'testimonials', 'popproducts'));
    }
    public function about(){
        $settings = Setting::first();
        $teams = Team::latest()->where('status',1)->get();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.about', compact('settings', 'teams' , 'popproducts'));
    }
    public function services(){
        $settings = Setting::first();
        $services = Service::latest()->where('status',1)->get();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.services',compact('settings', 'services', 'popproducts'));
    }
    // public function singleservice($slug){
    //     $settings = Setting::first();
    //     $service = Service::where('slug', $slug)->first();
    //     $popproducts=Product::latest()->where('status',1)->take(4)->get();
    //     return view('frontend.singleservice', compact('settings', 'service', 'popproducts'));
    // }
    public function products(){
        $settings = Setting::first();
        $products=Product::latest()->where('status',1)->paginate(8);
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.products', compact('settings', 'popproducts', 'products'));
    }
    public function singleproduct($slug){
        $settings = Setting::first();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        $product = Product::where('slug', $slug)->first();

        return view('frontend.singleproduct', compact('settings', 'popproducts', 'product'));
    }
    public function contact(){
        $settings = Setting::first();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.contact', compact('settings', 'popproducts'));
    }
    public function privacypolicies(){
        $settings = Setting::first();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.privacypolicies', compact('settings', 'popproducts'));
    }
    public function terms(){
        $settings = Setting::first();
        $popproducts=Product::latest()->where('status',1)->take(4)->get();
        return view('frontend.terms', compact('settings', 'popproducts'));
    }
}
