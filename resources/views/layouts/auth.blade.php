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
    <title>User</title>
    <link rel="stylesheet" href="{{ asset("main/css/auth.css") }}">

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="card">

                <div class="card-header center-align">
                    <h5><i class="icofont-login red-text"></i> User area</h5>
                </div>

                <div class="card-header center-align white h2">
                    <img src="{{ asset('logo.png') }}" style="height: 100px">
                    <span class="text-primary">RRD</span>
                </div>

                <div class="card-body">
            @yield("page")
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('main/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
</body>
</html>
