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
                <a href="index.html"><img src="logo.png" height="100" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="index.html">Home</a></li>
                    <li><a href="category.html">Category</a></li>
                    <li><a href="archive.html">Archive</a></li>
                    <li class="menu-has-children"><a href="">Pages</a>
                        <ul>
                            <li><a href="elements.html">Elements</a></li>
                        </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Blog</a>
                        <ul>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End header Area -->

<!-- Start banner Area -->
<section class="banner-area">
    <div class="container box_1170">
        <div class
             ="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content text-center col-lg-8">
                <h1>
                    Charter Yacht <br>
                    The Luxury Of Traveling
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Post Silder Area -->
<section class="post-slider-area">
    <div class="container box_1170">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="owl-carousel active-post-carusel">
                    <div class="post-box mb-30">
                        <div class="d-flex">
                            <div>
                                <a href="#">
                                    <img src="main/img/author/a1.png" alt="">
                                </a>
                            </div>
                            <div class="post-meta">
                                <div class="meta-head">
                                    <a href="#">Marvel Maison</a>
                                </div>
                                <div class="meta-details">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-calendar-full"></span>
                                                13th Oct, 2018
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-picture"></span>
                                                Image Post
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-coffee-cup"></span>
                                                Food & Travel
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-bubble"></span>
                                                03 Comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        <div class="post-btn">
                            <a href="#" class="primary-btn text-uppercase">Read More</a>
                        </div>
                    </div>

                    <div class="post-box mb-30">
                        <div class="d-flex">
                            <div>
                                <a href="#">
                                    <img src="main/img/author/a1.png" alt="">
                                </a>
                            </div>
                            <div class="post-meta">
                                <div class="meta-head">
                                    <a href="#">Marvel Maison</a>
                                </div>
                                <div class="meta-details">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-calendar-full"></span>
                                                13th Oct, 2018
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-picture"></span>
                                                Image Post
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-coffee-cup"></span>
                                                Food & Travel
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span class="lnr lnr-bubble"></span>
                                                03 Comments
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                        <div class="post-btn">
                            <a href="#" class="primary-btn text-uppercase">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Post Slider Area -->

<!-- Start main body Area -->
<div class="main-body section-gap mt--30">
    <div class="container box_1170">
        <div class="row">
            @yield("page")
            @include('layouts.sidebar')
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
                    <ul class="list instafeed d-flex flex-wrap">
                        <li><img src="img/i1.jpg" alt=""></li>
                        <li><img src="img/i2.jpg" alt=""></li>
                        <li><img src="img/i3.jpg" alt=""></li>
                        <li><img src="img/i4.jpg" alt=""></li>
                        <li><img src="img/i5.jpg" alt=""></li>
                        <li><img src="img/i6.jpg" alt=""></li>
                        <li><img src="img/i7.jpg" alt=""></li>
                        <li><img src="img/i8.jpg" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title">Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="f_social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
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

<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
<script src="{{ asset('js/easing.min.js') }}"></script>
<script src="{{ asset('js/hoverIntent.js') }}"></script>
<script src="{{ asset('js/superfish.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/waypoints.min.js') }}"></script>
<script src="{{ asset('js/mail-script.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
