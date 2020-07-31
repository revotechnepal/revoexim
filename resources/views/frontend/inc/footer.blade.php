<footer class="footer-area footer--dark bg-dark">
    <div class="footer-big">
      <!-- start .container -->
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-12">
            <div class="footer-widget">
              <div class="widget-about">
                {{-- <img src="{{Storage::disk('uploads')->url($settings->site_logo)}}" alt="" class="img-fluid"> --}}
                <p>{{strip_tags(substr($settings->about,0,100))}}...</p>
                <ul class="contact-details">
                  <li>
                    <span class="icon-earphones"></span> Call Us:
                    <a href="tel:+977-{{$settings->phone}}">+977-{{$settings->phone}}</a>
                  </li>
                  <li>
                    <span class="icon-envelope-open"></span>
                    <a href="mailto:{{$settings->email}}">{{$settings->email}}</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- Ends: .footer-widget -->
          </div>
          <!-- end /.col-md-4 -->
          <div class="col-md-3 col-sm-4">
            <div class="footer-widget">
              <div class="footer-menu footer-menu--1">
                <h4 class="footer-widget-title">Popular Product</h4>
                <ul>
                    @foreach ($popproducts as $popproduct)
                        <li>
                            <a href="/product/{{$popproduct->slug}}">{{$popproduct->title}}</a>
                        </li>
                    @endforeach
                </ul>
              </div>
              <!-- end /.footer-menu -->
            </div>
            <!-- Ends: .footer-widget -->
          </div>
          <!-- end /.col-md-3 -->

          <div class="col-md-3 col-sm-4">
            <div class="footer-widget">
              <div class="footer-menu">
                <h4 class="footer-widget-title">Our Company</h4>
                <ul>
                  <li>
                    <a href="{{route('about')}}">About Us</a>
                  </li>
                  <li>
                    <a href="{{route('services')}}">Services</a>
                  </li>
                  <li>
                    <a href="{{route('products')}}">Products</a>
                  </li>
                  <li>
                    <a href="{{route('contact')}}">Contact Us</a>
                  </li>
                </ul>
              </div>
              <!-- end /.footer-menu -->
            </div>
            <!-- Ends: .footer-widget -->
          </div>
          <!-- end /.col-lg-3 -->

          <div class="col-md-3 col-sm-4">
            <div class="footer-widget">
              <div class="footer-menu no-padding">
                <h4 class="footer-widget-title">Help Support</h4>
                <ul>
                  <li>
                    <a href="{{route('terms')}}">Terms &amp; Conditions</a>
                  </li>
                  <li>
                    <a href="{{route('privacypolicies')}}">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="#">Refund Policy</a>
                  </li>
                  <li>
                    <a href="#">FAQs</a>
                  </li>
                  <li>
                    <a href="#">Buyers Faq</a>
                  </li>
                  <li>
                    <a href="#">Sellers Faq</a>
                  </li>
                </ul>
              </div>
              <!-- end /.footer-menu -->
            </div>
            <!-- Ends: .footer-widget -->
          </div>
          <!-- Ends: .col-lg-3 -->

        </div>
        <!-- end /.row -->
      </div>
      <!-- end /.container -->
    </div>
    <!-- end /.footer-big -->

    <div class="mini-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="copyright-text">
              <p>© 2020
                <a href="#">RevoExim</a>. All rights reserved. Created by
                <a href="#">RevoTech</a>
              </p>
            </div>

            <div class="go_top" id="top" onclick="topFunction()">
              <span class="icon-arrow-up"><i class="fas fa-arrow-up"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
