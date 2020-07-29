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

<!-- Services Section Starts Here -->
<section id="what-we-do">
    <div class="container">
        <h2 class="section-title mb-2 h1">What we do</h2>
        <p class="text-center text-muted h5">Having and managing a correct marketing strategy is crucial in a fast moving market.</p>
        <div class="row mt-5">
            @foreach ($services as $service)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-xs-2 col-sm-2">
                                <a href="#"><i class="{{$service->icon}} custom"></i></a>
                            </div>

                            <div class="col-xs-10 col-sm-10">
                                <h3 class="card-title">{{$service->title}}</h3>
                                <p class="card-text">{{strip_tags(substr($service->details,0,200))}}.</p>
                                <a href="service/{{$service->slug}}" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="center">{{ $services->links() }}</div>
    </div>
</section>
<!-- Services Section Ends Here -->
@endsection
