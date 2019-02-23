<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
<div id="main" style="margin: 10px auto;background: #eee;">
    <div class="title" style="margin: 0 auto;text-align: center;padding: 2px;border-bottom: 5px solid #0b75c9;font-family: cursive;">
        <h1>Casco Code</h1>
    </div>
    <div class="body" style="background: white">
        <div class="cont" style="padding: 10px">
            <div class="row" style="padding: 5px">
                <img style="float: left;width:50px;height: 50px" src="https://image.flaticon.com/icons/svg/1054/1054437.svg">
                <h1 style="margin: 0;text-align: left;position: relative;top: 10px;font-family: sans-serif;">You Must Celebrate Now</h1>
            </div>
            <div class="row" style="line-height: 1.4;padding: 5px;margin-bottom: 5px; ">
                <h4>
                    You Must Be Happy And Prepare YourSelf Our HR Team Accepted Your Request, And Now Our System Is Waiting
                    You To Complete Registration <br>
                    We Generated A Link To Take You Directly To Register Page <br>
                    <h3> To Be Able To Register In Our Website You Will Need A Secret Code And We Made One For you </h3>
                    <u style="color: #0b75c9"> Most Of Fields In The Page Will Fill Out Automatically </u>
                </h4>
                <h2 style="text-align: center;display: block;">Registration Code :{{ $code }}</h2>
                <span style="width: 100%; display: block;text-align: center">
                    <a href="{{ route('register',$id) }}" style="margin: 20px;color: white; text-decoration: none; background:#428dc9;padding: 15px; ">Complete Register</a>
                </span>
                <h4> If The Button Not Working Copy The Link And Paste It In You Browser <br>
                    <a href="{{ route('register',$id) }}">{{ route('register',$id) }}</a>
                </h4>
            </div>
            <hr style="background: #eee; height: 5px">
            <div class="row" style="line-height: 1.4;padding: 5px;margin-bottom: 5px;">
                <h5 style="margin: 0 auto">You Can Contact Us On <a style="text-decoration: none;color: #0b75c9" href="mailtto:hr@cascocode.com">hr@cascocode.com</a></h5>
            </div>
            </div>
        <div class="title" style="background:#eee;margin: 0 auto;text-align: center;padding: 1px;border-top: 5px solid #0b75c9;font-family: cursive;">
            <h5> {{ date("Y") }} : &copy; Casco Code</h5>
        </div>
    </div>

</div>
</body>
</html>
