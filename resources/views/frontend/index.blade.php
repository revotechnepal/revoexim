@extends('frontend.layouts.app')
@section('content')
        <!-- Carousel Starts here -->
        <div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-content-style slider-home-one">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="carousel-item active slide-1" style="background-image: url(http://lorempixel.com/1920/1000/sports/1/);">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="box valign-middle">
                                <div class="content text-center">
                                    <h3 data-animation="animated fadeInUp">Law Expertise.</h3>
                                    <p data-animation="animated fadeInUp">Justice <span class="sep">.</span> Equality <span class="sep">.</span> Trust</p>
                                    <a data-animation="animated fadeInDown" href="#" class="thm-btn ">Free Consultation</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item slide-2" style="background-image: url(http://lorempixel.com/1920/1000/sports/2/);">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="box valign-middle">
                                <div class="content text-center">
                                    <h3 data-animation="animated fadeInUp">Law Expertise.</h3>
                                    <p data-animation="animated fadeInUp">Justice <span class="sep">.</span> Equality <span class="sep">.</span> Trust</p>
                                    <a data-animation="animated fadeInDown" href="#" class="thm-btn ">Free Consultation</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Controls -->
            <a class="carousel-control-prev" href="#minimal-bootstrap-carousel" role="button" data-slide="prev">
                <i class="fa fa-long-arrow-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#minimal-bootstrap-carousel" role="button" data-slide="next">
                <i class="fa fa-long-arrow-right"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Carousel Ends Here -->

        <!-- About Starts Here -->
        <section class="jumbotron section-about text-center">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="header-section">
                            <h2 class="title">About <span>Revo Exim</span></h2>
                            <p class="description">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some injected humour</p>
                            <a href="#" class="mt-5 btn btn-success custom-btn">Read More</a>
                        </div>
                    </div>
                </div>
        </section>
        <!-- About Ends Here -->
        <!-- Services Starts Here -->
        <section class="section-services">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-10 col-lg-8">
                        <div class="header-section">
                            <h2 class="title">Exclusive <span>Services</span></h2>
                            <p class="description">There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some injected humour</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Single Service -->
                    @foreach ($services as $service)
                        <div class="col-md-6 col-lg-4">
                            <div class="single-service">
                                <div class="part-1">
                                    <i class="{{$service->icon}}"></i>
                                    <h3 class="title">{{$service->title}}</h3>
                                </div>
                                <div class="part-2">
                                    <p class="description">{{strip_tags(substr($service->details,0,150)) }}...</p>
                                    <a href="#"><i class="fas fa-arrow-circle-right"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- / End Single Service -->
                </div>
            </div>
        </section>
        <!-- Services Ends Here -->
        <!-- Testimonials Start Here -->
        <div class="card col-md-10 my-4 py-5">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2000">
            <div class="w-100 carousel-inner" role="listbox">
              <div class="carousel-item active">
                <div class="bg"></div>
                <div class="carousel-caption">
                  <div class="row justify-content-md-center">
                    <div class="col-sm-3 ">
                      <img src="@if($acttesti->image == 'post.jpg' || $acttesti->image==''){{asset('frontend/images/head.png')}}@else{{Storage::disk('uploads')->url($acttesti->image)}}@endif" alt="" style="width:75px; height:75px;" class="rounded-circle">
                    </div>
                    <div class="col-sm-6">
                      <h3>{{$acttesti->name}}</h3>
                      <small>{{strip_tags($acttesti->message)}}.</small>
                      <small class="smallest mute">- {{$acttesti->company_name}}</small>
                    </div>
                  </div>
                </div>
              </div>
              @foreach ($testimonials as $testimonial)
                <div class="carousel-item">
                    <div class="bg"></div>
                    <div class="carousel-caption">
                        <div class="row justify-content-md-center">
                            <div class="col-sm-3">
                            <img src="@if($testimonial->image == 'post.jpg' || $testimonial->image==''){{asset('frontend/images/head.png')}}@else{{Storage::disk('uploads')->url($testimonial->image)}}@endif" alt="" style="width: 75px; height:75px;" class="rounded-circle">
                            </div>
                            <div class="col-sm-6">
                            <h3>{{$testimonial->name}}.</h3>
                            <small>{{strip_tags($testimonial->message)}}.</small>
                            <small class="smallest mute">- {{$testimonial->company_name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <!-- Testimonials Ends Here -->
        <!-- NewsLetter Starts Here -->
        <section id="section-cta">
            <div class="sep-background-mask"></div>
            <div class="container">
                <div class="quick_newsletter row text-center">
                    <div class="newsletter-info col-md-12 col-sm-12">
                        <h3>Contact us for shipping right now and for the next shipment.</h3>
                        <p>And stay informed about our products</p>
                        <p><a href="{{route('contact')}}" class="newsletter-submit btn btn-success custom-btn mt-4"><i class="fa fa-paper-plane"></i> Contact Us</a></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- NewsLetter Ends Here -->
@endsection
