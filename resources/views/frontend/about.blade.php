@extends('frontend.layouts.app')
@section('content')
<div class="image-aboutus-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lg-text">About Us</h1>
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
                    <li class="active">About Us</li>
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
                <h1 class="strong">Who we are</h1>
                <p class="lead">This is the world's leading portal for<br>easy and quick </p>
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Donec vel mauris quam. Lorem ipsum dolor sit amet. Nulla convallis egestas rhoncus.</p>
            </div>
        </div>
    </div>
</div>
<div class="container team-sektion py-5">
    <div class="row">
        <div class="w-100 site-heading text-center">
            <h3>Our Team</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt <br> ut labore et dolore magna aliqua. Ut enim ad minim </p>
            <div class="border"></div>
        </div>
    </div>
    <div class="container py-5">
      <div class="row">
          @foreach ($teams as $team)
            <div class="col-md-4 col-sm-6 py-3">
                <div class="our-team">
                    <div class="pic">
                        <img src="@if($team->image == 'post.jpg' || $team->image==''){{asset('frontend/images/team.jpeg')}}@else{{Storage::disk('uploads')->url($team->image)}}@endif" alt="team member" class="img-responsive">
                    </div>
                    <div class="content">
                        <h3 class="title">{{$team->name}}</h3>
                        <span class="post">{{$team->post}}</span>
                        <ul class="social">
                            <li><a href="{{$team->facebook}}" class="fa fa-facebook"></a></li>
                            <li><a href="{{$team->twitter}}" class="fa fa-twitter"></a></li>
                            <li><a href="{{$team->instagram}}" class="fa fa-instagram"></a></li>
                            <li><a href="{{$team->linkedin}}" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
          @endforeach
      </div>
  </div>
</div>
@endsection
