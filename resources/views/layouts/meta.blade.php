<title> {{ config('app.name') }} | {{ $pageTitle ?? '' }}</title>

<!-- Meta Tags
========================== -->
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta http-equiv="Content-Language" content="ar-eg" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta name="rating" content="General" />

<link rel="apple-touch-icon-precomposed" href="{{ url('/logo.png') }}">
<link rel="icon" href="{{ url('/logo.png') }}">
<link rel="icon" href="{{ url('/favicon.ico') }}">
<!-- end favicon -->

{{--// theme color --}}
<meta name="msapplication-TileColor" content="#8c61fa" />
<meta name="theme-color" content="#8c61fa">


{{--{{ dd(Request::path())  }}--}}
@if (Request::path() == '/' || Request::path() == 'blogs' || Request::path() == 'projects' || Request::path() == 'home')
    <!-- SEO Meta -->
    <link href="{{ config("app.url") }}" rel="canonical" />
    <meta name="author" content="{{ config("app.name") }}">
    <meta name="description" content="{{ config('app.description') }}">
    <meta name="keywords" content="{{ config("app.keywords") }}">
    <!-- end SEO Meta -->


    <!-- favicon, cards, tiles, icons -->
    <meta name="application-name" content="{{ config("app.name") }}" />
    <meta name="msapplication-TileImage" content="{{ url('/logo.png') }}" />
    <meta name="msapplication-TileColor" content="#ff8431" />
    <meta name="msapplication-square70x70logo" content="{{ url('/logo.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ url('/logo.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ url('/logo.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ url('/logo.png') }}" />


    <!-- facebook open graph -->
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:locale" content="ar_EG"/>
    <meta property="og:locale:alternate" content="en_SU"/>
    <meta property="og:url" content="{{  URL::current()  }}"/>
    <meta property="og:title" content="{{ config("app.name") }} | {{ "الرئيسية" }}"/>
    <meta property="og:image" content="{{ url('/logo.png') }}"/>
    <meta property="og:image:width" content="256"/>
    <meta property="og:image:height" content="256"/>
    <!-- end facebook open graph -->

    <!-- Schema MicroData (Google+,Google, Yahoo, Bing,) -->
    <meta itemprop="name" content="{{ config("app.name") }} | {{ "الرئيسية" }}"/>
    <meta itemprop="url" content="{{  URL::current()  }}"/>
    <meta itemprop="author" content="{{ config('site.social.instagram') }}"/>
    <meta itemprop="image" content="{{ url('/logo.png') }}">
    <!-- End Schema MicroData -->

    <!-- twitter cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ "@".username(config('site.social.twitter')) }}">
    <meta name="twitter:creator" content="{{ "@".username(config('site.social.twitter')) }}">
    <meta name="twitter:title" content="{{ config("app.name") }} | {{ "الرئيسية" }}">
    <meta name="twitter:image:src" content="{{ url('/logo.png') }}">
    <!-- end twitter cards -->
@elseif(isset($post) || isset($page) || isset($project) || isset($pro))
    <!-- SEO Meta -->
    <link href="{{  URL::current()  }}" rel="canonical"/>
    <meta name="description" content="{{ $description ?? "" }}">
    <meta name="keywords" content="{{ $keywords ?? "" }}">
    <!-- end SEO Meta -->


    <!-- favicon, cards, tiles, icons -->
    <meta name="application-name" content="{{ config("app.name") }} | {{ $pageTitle }}" />
    <meta name="msapplication-TileImage" content="{{ $image ?? asset('logo.png') }}" />
    <meta name="msapplication-TileColor" content="#ff8431" />
    <meta name="msapplication-square70x70logo" content="{{ $image ?? asset('logo.png') }}" />
    <meta name="msapplication-square150x150logo" content="{{ $image ?? asset('logo.png') }}" />
    <meta name="msapplication-wide310x150logo" content="{{ $image ?? asset('logo.png') }}" />
    <meta name="msapplication-square310x310logo" content="{{ $image ?? asset('logo.png') }}" />
    <!-- end favicon -->

    <!-- facebook open graph -->
    <meta property="og:type" content="{{ (!isset($post) || isset($pro))?"website":"article" }}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:locale" content="ar_EG"/>
    <meta property="og:locale:alternate" content="en_SU"/>
    <meta property="og:url" content="{{  URL::current()  }}"/>
    <meta property="og:title" content="{{ config("app.name") }} | {{ $pageTitle }}"/>
    <meta property="og:image" content="{{ $image ?? asset('logo.png') }}"/>
    <meta property="og:image:width" content="400"/>
    <meta property="og:image:height" content="400"/>
    <!-- end facebook open graph -->

    <!-- Schema MicroData (Google+,Google, Yahoo, Bing,) -->
    <meta itemprop="name" content="{{ config("app.name") }} | {{ "الرئيسية" }}"/>
    <meta itemprop="url" content="{{  URL::current()  }}"/>
    <meta itemprop="author" content="{{ config('site.social.instagram') }}"/>
    <meta itemprop="image" content="{{ url('/logo.png') }}">
    <!-- End Schema MicroData -->

    <!-- twitter cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="{{ "@".username(config('site.social.twitter')) }}">
    <meta name="twitter:creator" content="{{ "@".username(config('site.social.twitter')) }}">
    <meta name="twitter:title" content="{{ config("app.name") }} |  {{ $pageTitle }}">
    <meta name="twitter:image:src" content="{{ $image ?? asset('logo.png') }}">
    <!-- end twitter cards -->
@endif
