<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/bootstraps.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <style>
        body {

        }
    </style>
</head>
<body>
<div class="section">
    <div class="container">
        <div class="row valign" style="margin-top: 30vh">
            <div class="col-md-4">
                <img class="responsive-img" src="{{ asset('imgs/not.svg') }}"/>
            </div>
            <div class="col-md-8 center-align">
                <h3 style="margin-top: 15vh">You ARe Not Allowed To Be Here</h3>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
</body>
</html>