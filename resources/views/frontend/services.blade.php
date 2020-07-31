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
                    <li class="active">Services</li>
                </ol>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-4">
            </div>
        </div>
    </div>
</div>
<div class="aboutus-secktion py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="strong">What we Do?</h1>
            </div>
            <div class="col-md-6">
                <p>{{strip_tags($settings->service)}}</p>
            </div>
        </div>
    </div>
</div>
<!-- Services Section Starts Here -->
<section id="what-we-do">
    <div class="container">
        <h2 class="section-title mb-2 h1">Our Services</h2>
        <div class="row mt-5">
            @foreach ($services as $service)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-xs-2 col-sm-2">
                                <a href="#"><i class="{{$service->icon}} custom"></i></a>
                            </div>

                            <div class="col-xs-10 col-sm-10">
                                <h5 class="card-title">{{$service->title}}</h5>
                                <p class="card-text" style="font-size:12px;">{{strip_tags($service->details)}}.</p>
                                {{-- <a href="service/{{$service->slug}}" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Services Section Ends Here -->
@endsection
