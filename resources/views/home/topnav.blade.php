<?php $routeName = \Request::route()->getName(); ?>

<nav class="navbar navbar-expand-sm navbar-light shadow ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('main/img/logo.svg') }}" height="30" class="d-inline-block align-top"
                 alt="Casco Code">
            <span class="text-primary">C</span>asco <span class="text-primary">C</span>ode
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    @endguest
                    @auth
                    <a class="nav-link" href="{{ route('login') }}">Go To Account</a>
                    @endauth
                </li>
                <li class="nav-item @if($routeName == "blog") active @endif ">
                    <a class="nav-link" href="{{ route('blog') }}">Blog <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if($routeName == "services") active @endif ">
                    <a class="nav-link" href="{{ route('services') }}">Our Services <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>

    </div>
</nav>
