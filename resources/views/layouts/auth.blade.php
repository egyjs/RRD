<?php
/**
 * Created by PhpStorm.
 * User: el3zahaby
 * Date: 12/7/18
 * Time: 10:59 PM
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('main/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset("main/css/auth.css") }}">

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            @yield("page")
        </div>
    </div>
</div>

<script src="{{ asset('main/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
<script src="{{ asset("main/js/bootstrap/bootstrap.min.js") }}"></script>
<script src="{{ asset("main/js/materialize.min.js") }}"></script>
<script src="{{ asset("main/js/wow.min.js") }}"></script>
</body>
</html>
