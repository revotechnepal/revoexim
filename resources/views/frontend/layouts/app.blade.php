<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revo Exim</title>
    <link rel="shortcut icon" href="{{Storage::disk('uploads')->url($settings->site_favicon)}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <script src="https://kit.fontawesome.com/a45324daee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:500,700&display=swap" rel="stylesheet">
    <style>

    </style>
</head>

<body>
    @include('frontend.inc.header')
    <!-- Header Ends Here -->
    @yield('content')

    @include('frontend.inc.footer')
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="((asset('frontend/js/carousel.js')))"></script>
    <script>
        var top = document.getElementById("top");

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>
