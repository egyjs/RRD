@inject('function', 'App\Http\Controllers\Functions')
        <!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">


    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{ $pageTitle ?? "Dashboard" }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="{{ asset('dash//plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="{{ asset('dash/plugins/node-waves/waves.css') }}" rel="stylesheet" />


    <!-- Animation Css -->
    <link href="{{ asset('dash/plugins/animate-css/animate.css') }}" rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="{{ asset("dash/plugins/bootstrap-select/css/bootstrap-select.css") }}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{ asset('dash/css/style.css') }}" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('dash/css/themes/all-themes.css') }}" rel="stylesheet" />
    <link href="{{ asset('dash/css/fontawesome-iconpicker.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('dash/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/icofont.css') }}">

    <style>
        .ellipsis {
            width: 100%;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
        }

        .invers {
            filter: invert(1) grayscale(1) contrast(10);
        }
    </style>
    @stack('css')
</head>

<body class="theme-deep-purple">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{ route('dash.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info cover-img" style="background: url({{ Auth::user()->cover  }}) no-repeat no-repeat; background-size: cover;">
            <div class="image">
                <img src="{{ Auth::user()->img  }}" width="48" height="48" alt="User" class="pic" />
            </div>
            <div class="info-container">
                <div class="name invers" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">{{ Auth::user()->fullname }}</div>
                <div class="email invers">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons invers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route("dash.profile")  }}"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="#chngpas" data-toggle="modal" data-target="#chngpas"><i class="material-icons">security</i>Change
                                Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                        <form style="display: none" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        @include('dash.components.menu')
   </aside>
</section>

<section class="content">
    @yield('main')
</section>

<style>

    .p-border {
        border: 1px solid #eee !important;
        padding: 4px !important;
    }
</style>
<!-- The Modal -->
<div class="modal wow " id="chngpas">
    <div class="modal-dialog">
        <form action="{{ route('dash.change.pass') }}" method="post" class="modal-content">
        @csrf
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Change Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <input autocomplete="false" class="form-control p-border " type="password" name="old"
                           placeholder="The Old Password">
                    <input autocomplete="false" class="form-control p-border" type="password" name="new"
                           placeholder="The New Password">
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>

        </form>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="{{ asset('dash/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Core Js -->
<script src="{{ asset('dash/plugins/bootstrap/js/bootstrap.js') }}"></script>
<!-- Select Plugin Js -->
<script src="{{ asset('dash/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<!-- Slimscroll Plugin Js -->
<script src="{{ asset('dash/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<!-- Waves Effect Plugin Js -->
<script src="{{ asset('dash/plugins/node-waves/waves.js') }}"></script>
<script src="{{ asset('dash/js/fontawesome-iconpicker.min.js') }}"></script>


@stack('js')

<!-- Custom Js -->
<script src="{{ asset('dash/js/admin.js') }}"></script>
<!-- Demo Js -->
{{--<script src="{{ asset('dash/js/demo.js') }}"></script>--}}


</body>
</html>
