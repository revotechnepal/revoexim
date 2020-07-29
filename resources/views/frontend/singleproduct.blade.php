@extends('frontend.layouts.app')
@section('content')
<section class="product py-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="@if($product->image == 'post.jpg' || $product->image==''){{asset('frontend/images/product.jpg')}}@else{{Storage::disk('uploads')->url($product->image)}}@endif" alt="Men's Fashion" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <h2>{{$product->title}}</h2>
                <p class="para">
                    {{strip_tags($product->details)}}
                </p>
                <p class="product-card-para py-2 text-center"><a href="{{route('products')}}" class="btn btn-success custom-btn">Back To Products Page</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
