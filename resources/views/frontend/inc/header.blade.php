<!-- Header Starts Here -->
<header>
    <!-- Top Nav Starts Here -->
    <div id="top-bar" class="hidden-md-down">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-12">
                    <ul class="top-bar-info">
                        <li><i class="fas fa-map-marker-alt"></i>{{strip_tags($settings->address)}}</li>
                        <li><i class="fas fa-phone-square"></i> Phone: +977 {{$settings->phone}}</li>
                        <li><i class="fa fa-envelope"></i>Email: {{$settings->email}}</li>
                    </ul>
                </div>
                <div class="col-md-3 col-12">
                    <ul class="social-icons hidden-sm">
                        <li><a target="_blank" href="{{$settings->facebook}}"><i class="fab fa-facebook"></i></a></li>
                        <li><a target="_blank" href="{{$settings->twitter}}"><i class="fab fa-twitter"></i></a></li>
                        <li><a target="_blank" href="{{$settings->linkedin}}"><i class="fab fa-linkedin"></i></a></li>
                        <li><a target="_blank" href="{{$settings->instagram}}"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Nav Ends Here -->
    <!--Navbar Starts Here-->
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">
                <!-- <img src="https://mdbootstrap.com/img/logo/mdb-transparent.png"  alt=""> -->
                <img src="{{Storage::disk('uploads')->url($settings->site_logo)}}" height="30" alt="{{$settings->site_name}}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('services')}}" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('products')}}" class="nav-link">Product</a>
                  </li>
                    <li class="nav-item">
                        <a href="{{route('contact')}}" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Navbar Ends Here -->
</header>
