<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>


    @include('layouts.meta')

        <!-- FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700|Roboto:400,500" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset("main/css/linearicons.css") }}">
        <link rel="stylesheet" href="{{ asset('main/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('main/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('main/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('main/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('main/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('main/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('main/css/main.css') }}">
    @stack("css")

</head>
<body >
<!-- Start header Area -->
<header id="header">
    <div class="container box_1170 main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="{{ route('home') }}"><img src="{{ asset('logo.png') }}" height="100" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    @foreach(config('site.menu') as $name => $url)
                        <li @if($url == "true")  class="menu-has-children" @endif>
                            <a  @if($url != "true")  href="{{ $url }}" @else href="#" @endif >
                                {{$name}}
                            </a>
                            @if($url == "true")
                                @if(count(loopMenu($name)) > 0)
                                    <ul>
                                        @foreach((loopMenu($name)) as $page)
                                            <li><a href="{{ url($page->slug) }}">{{ $page->title  }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif

                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End header Area -->
@if (Request::path() == '/' || Request::path() == 'home')
    @include('nav.index')
@else
    @include('nav.page')
@endif
    <!-- Start main body Area -->
<div class="main-body section-gap mt--30">
    <div class="container box_1170">
        <div class="row">
            @yield("page")
            @if (Request::path() == '/' || Request::path() == 'home')
                @include('layouts.sidebar')
            @endif
        </div>
    </div>
</div>
<!-- End main body Area -->


<!-- start footer Area -->
<footer class="footer-area section-gap">
    <div class="container box_1170">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">About Us</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
                        magna aliqua.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Newsletter</h6>
                    <p>Stay updated with our latest trends</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                              method="get" class="subscribe_form relative">
                            <div class="input-group d-flex flex-row">
                                <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
                                       required="" type="email">
                                <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
                            </div>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget instafeed">
                    <h6 class="footer_title">Instagram Feed</h6>
                    <ul class="list instafeed d-flex flex-wrap" id="instagram-feed">
                        <ul>loading...</ul>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title">Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="f_social">
                        @foreach((config('site.social')) as $name => $url)
                            <a href="{{http($url)}}" target="_blank"><i class="fa fa-{{$name}}"></i></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom d-flex justify-content-between align-items-center">
            <p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
    </div>
</footer>
<!-- End footer Area -->

<script src="{{ asset('main/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{{ asset('main/js/vendor/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ asset('main/js/easing.min.js') }}"></script>
<script src="{{ asset('main/js/hoverIntent.js') }}"></script>
<script src="{{ asset('main/js/superfish.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('main/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('main/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('main/js/waypoints.min.js') }}"></script>
<script src="{{ asset('main/js/mail-script.js') }}"></script>
<script src="{{ asset('main/js/main.js') }}"></script>

<script type="text/javascript" src="{{ asset('main/js/jquery.instagramFeed.min.js') }}"></script>
<script type="text/javascript">
    (function($){
        $(window).on('load', function(){
            $.instagramFeed({
                'username': '{{  username( config('site.social.instagram') ) }}',
                'container': "#instagram-feed",
                'display_profile': false,
                'display_biography': false,
                'display_gallery': true,
                'get_raw_json': false,
                'callback': null,
                'styling': true,
                'items': 6,
                'items_per_row': 3,
                'margin': 1
            });
        });
    })(jQuery);
</script>


@stack("js")
<script id="dsq-count-scr" src="//rrd-2.disqus.com/count.js" async></script>

</body>

</html>
