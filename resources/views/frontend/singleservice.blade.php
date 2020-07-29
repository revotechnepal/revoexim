@extends('frontend.layouts.app')
@section('content')
<div class="image-aboutus-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lg-text">Services</h1>
                <p class="image-aboutus-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
</div>
<div class="bread-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-8">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('services')}}">Services</a></li>
                    <li class="active">{{$service->title}}</li>
                </ol>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-4">
            </div>
        </div>
    </div>
</div>

<!-- Services Section Starts Here -->
<section id="what-we-do">
    <div class="container">
        <h2 class="section-title mb-2 h1">{{$service->title}}</h2>
        <p class="text-center text-muted h5">{{strip_tags($service->details)}}</p>
    </div>
</section>
<!-- Services Section Ends Here -->
@endsection
