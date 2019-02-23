<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Link</title>
</head>
<body style="margin: 0;font-family: 'Roboto', Arial, Tahoma, sans-serif">
<div class="app">
    <div class="header" style="height: 30px;padding: 20px;background: #fff;border-bottom: 4px solid orangered">
        <div class="text" style="display: inline-block">
            <h3 style="margin:0px;top:10px;position: relative;left: 5px;">Reset Your Password</h3>
        </div>
        <div class="logo" style="height: 40px;float: left">
            <img style="height: 100%" src="{{ asset('imgs/icon-padlock.png') }}" alt="">
        </div>
    </div>
    <div class="body" style="text-align: left; padding:5px 15px">
        <p>
            We Received A Request from you To Recover your password using a link <br>
            so we sent this email to you <br>
        </p>
        <p><b>Please Click The button Bellow To Recover Your Password </b>
            <br>
        </p>
        <div class="a" style="top: 15px;position: relative; text-align: center; margin: 0 auto;">
                <a href="{{ url('password/reset/'.$token) }}"
                   style="text-decoration: none;color: white; padding: 10px;background: #0a6ebd">Reset Password</a>
            </div>
        <br>
        <br>
        <p>
            if you not request password reset link , No further actions needn't from you :-)
        </p>
        <p>
           <b> if you can't click the button copy the link bellow and paste in your browser or click it
           </b>
            <a href="{{ url('password/reset/'.$token) }}">{{ url('password/reset/'.$token) }}</a>
        </p>
    </div>
    <div class="footer" style="background: #343a40;">
        <div class="cont" style="padding: 3px;padding-bottom: 10px;text-align: center;color: white">
            <h5 style="display: inline-block">Copyrights : {{ date('Y') }} &copy;  </h5>
            <a href="{{ route('home') }}" style="top: 5px;position: relative">
                <img style="height: 20px" src="{{ asset('logo.png ') }}">
            </a>
            <h5 style="display: inline-block">Casco Code</h5>
        </div>
    </div>
</div>
</body>
</html>
