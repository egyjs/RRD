<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Reject Email </title>
</head>
<body>
<div id="main" style="margin: 10px auto;background: #eee;">
    <div class="title" style="margin: 0 auto;text-align: center;padding: 2px;border-bottom: 5px solid #0b75c9;font-family: cursive;">
        <h1>Casco Code</h1>
    </div>
    <div class="body" style="background: white">
        <div class="cont" style="padding: 10px">
            <div class="row" style="padding: 5px">
                <img style="float: left;width:50px;height: 50px" src="{{ asset('imgs/palon.svg') }}">
                <h3 style="margin: 0;text-align: left;position: relative;top: 10px;font-family: sans-serif;">You Have Completed Registration In Our Website</h3>
            </div>
            <div class="row" style="line-height: 1.4;padding: 5px;margin-bottom: 5px; ">
                <hr style="width: 100%;height: 3px;background: #0a6ebd;">
                <h4>
                    <span style="color: #0a6ebd">This Email Contain YOur Account Information So That Save This Email May Be You Need In The Future </span>
                </h4>
                <ul>
                    <li><span style="color: #0a6ebd">Email :</span> {{ $email Or "test@test.com" }} </li>
                    <li><span style="color: #0a6ebd">FullName :</span> {{ $name Or "test@test.com" }} </li>
                    <li><span style="color: #0a6ebd">Username :</span> {{ $username Or "test@test.com" }} </li>
                </ul>
                <h4 style="font-weight: normal"><b>Note!</b> You Can Login Using Your Email Address Or Your Username</h4>
                <br>
                <span style="width: 100%; display: block;text-align: center">
                    <a href="{{ route('login') }}" style="margin: 20px;color: white; text-decoration: none; background:#428dc9;padding: 15px; "> Login Now</a>
                </span>

            </div>
            <br>
            <hr style="background: #eee; height: 5px">
            <div class="row" style="line-height: 1.4;padding: 5px;margin-bottom: 5px;">
                <h5 style="margin: 0 auto">If YOu Have Any Problems You Can Contact Us On <a style="text-decoration: none;color: #0b75c9" href="mailtto:admin@cascocode.com">admin@cascocode.com</a></h5>
            </div>
        </div>
        <div class="title" style="background:#eee;margin: 0 auto;text-align: center;padding: 1px;border-top: 5px solid #0b75c9;font-family: cursive;">
            <h5> 2017 - {{ date('Y') }} : &copy; Casco Code</h5>
        </div>
    </div>

</div>
</body>
</html>