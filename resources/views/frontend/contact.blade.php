@extends('frontend.layouts.app')
@section('content')
<div class="image-aboutus-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="lg-text">Contact Us</h1>
                <p class="image-aboutus-para">Feel free to contact us for more information.</p>
            </div>
        </div>
    </div>
</div>
<div class="bread-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-8">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Contact Us</li>
                </ol>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-4">
            </div>
        </div>
    </div>
</div>
<div class="container animated fadeIn py-5">
    <div class="row">
        <div class="col-sm-6">
            <iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m22!1m8!1m3!1d3532.729951478492!2d85.28702111506179!3d27.694740182797112!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d27.6947919!2d85.2889323!4m5!1s0x39eb184c1197ac51%3A0xdef0bf95b747759d!2sRevo%20tech!3m2!1d27.6948306!2d85.2890421!5e0!3m2!1sen!2snp!4v1595830508427!5m2!1sen!2snp"
                allowfullscreen></iframe>
        </div>
        <div class="col-sm-6 form">
            <form action="form.php" class="contact-form" method="post">

                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="nm" placeholder="Name" required="" autofocus="">
                </div>


                <div class="form-group form_left">
                    <input type="email" class="form-control" id="email" name="em" placeholder="Email" required="">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No." required="">
                </div>
                <div class="form-group">
                    <textarea class="form-control textarea-contact" rows="5" id="comment" name="FB" placeholder="Type Your Message/Feedback here..." required=""></textarea>
                    <br>
                    <button class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Send </button>
                </div>
            </form>
        </div>

    </div>

    <div class="container second-portion">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class="info">
                            <h3 class="title pt-3">MAIL & WEBSITE</h3>
                            <p>
                                <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp info@revonepal.com
                                <br>
                                <br>
                                <i class="fa fa-globe" aria-hidden="true"></i> &nbsp revoexim.com
                            </p>

                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
                        <div class="info">
                            <h3 class="title pt-3">CONTACT</h3>
                            <p>
                                <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+977)-01-4282309
                                <br>
                                <br>
                                <i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+977)-9847212520
                            </p>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="box">
                    <div class="icon">
                        <div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="info">
                            <h3 class="title pt-3">ADDRESS</h3>
                            <p>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp Ravibhawan-14, Kathmandu.
                                <br>
                                <br>
                                <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp P.O Box: 44600, Kathmandu,Nepal.
                            </p>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>


        </div>
    </div>

</div>
@endsection
