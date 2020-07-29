@extends('frontend.layouts.app')
@section('content')
<div class="image-aboutus-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lg-text">Our Product</h1>
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
                    <li class="active">Product</li>
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
                <h1 class="strong">What are our Products</h1>
                <p class="lead">This is the world's leading portal for<br>easy and quick </p>
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet. Nulla convallis egestas rhoncus.</p>
            </div>
        </div>
    </div>
</div>
<section id="what-we-do">
    <div class="container">
        <h2 class="section-title mb-2 h1">Our Products</h2>
        <p class="text-center text-muted h5">We Import and Exports Products as per your needs</p>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-3">
                <div class="product-card">
                    <div class="product-card-head">
                        <img class="product-card-img-top" src="@if($product->image == 'post.jpg' || $product->image==''){{asset('frontend/images/product.jpg')}}@else{{Storage::disk('uploads')->url($product->image)}}@endif" alt="{{$product->title}}">
                    </div>
                    <div class="product-card-body">
                        <h4 class="product-card-title text-center">{{$product->title}}</h4>
                        <p class="product-card-para py-2 text-center"><a href="/product/{{ $product->slug }}" class="btn btn-success custom-btn">View Details</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="center">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
