<!-- Start banner Area -->
<section class="banner-area relative"style="background-image: url({{ $image }})">
    <div class="overlay overlay-bg"></div>
    <div class="container box_1170">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    {{ $pageTitle }} Page
                </h1>
                <p class="text-white link-nav"><a href="{{ route('home') }}">Home </a> <span class="lnr lnr-arrow-right"></span>
                    <a href="{{ url()->current() }}">
                        {{ $pageTitle }}</a></p>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->
