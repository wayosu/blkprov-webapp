<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} UPTD BLK LATRANS Provinsi Gorontalo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/front/images/logo-pemprov.png') }}" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/magnific-popup.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/front/css/custom.css') }}">
</head>

<body>
    @include('layouts.front.header')

    @include('layouts.front.navbar')

    @yield('content')

    @include('layouts.front.footer')

    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <!-- Plugin JS -->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="{{ asset('assets/front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('assets/front/js/custom.js') }}"></script>
    <script>
        // Navbar Sticky Top
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            var navbar = $('#navbar');

            // if win >= navbar and not already a sticky
            if (windowpos >= navbar.position().top && !navbar.hasClass("navbar-fixed-top") ) {
                navbar.addClass("navbar-fixed-top");

            // if win <= navbar and is a sticky
            } else if( windowpos <= navbar.position().top && navbar.hasClass("navbar-fixed-top")  ) {
                navbar.removeClass("navbar-fixed-top");
            }
        });
        
        $(document).ready(function() {
            // Img Popup
            $('.img-link-popup').magnificPopup({
                delegate: 'a',
                type: 'image',
            });
        });
    </script>
</body>

</html>