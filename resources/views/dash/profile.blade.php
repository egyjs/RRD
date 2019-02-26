@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
<div class="page-body profile-page">
    <div class="cover-holder">
        <label for="cover" class="cover-img img-container"><a ><i class="fa fa-edit fa-2x"></i></a></label>
        <div class="profile-info">
            <label class="img-container" for="picInp">
                <img src="{{ $profile->img }}" class="pic" alt="User Image" >
                <a ><i class="fa fa-edit fa-2x"></i></a>
            </label>
            <div class="sub">
                <div class="name" data-editable>{{$profile->fullname}}</div>
                <div class="detail">
                    <i class="fa fa-address-card m-r-5"></i>{{ (json_decode($profile->roles)[0]->description)  }}
                </div>
            </div>
        </div>
    </div>
    <form class="card"  method="POST" action="{{ route("dash.editprofile") }}" enctype="multipart/form-data">
        @csrf
        <div class="header">
            <h2>
                Profile information
            </h2>
        </div>
        <div class="body">
            <div class="form-horizontal">
                <input id="picInp" type="file" name="pic" style="display: none"/>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="name">Full Name</label>
                    </div>
                    <div class="col-lg-10 col-md-5 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $profile->fullname }}" >
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="email">Email Address</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="email" name="email" class="form-control" value="{{ $profile->email }}" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" id="username" name="username" class="form-control" value="{{ $profile->username }}" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="cover">Cover Image</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" id="cover" name="cover" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@push('css')
    <style>
        .profile-page {
            padding: 0 !important;
        }
        .profile-page .cover-holder {
            position: relative;
            height: 400px;
        }
        .profile-page .cover-holder .cover-img {

            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ $profile->cover }}");
            background-size: contain;
        }
        .profile-page .cover-holder .profile-info {
            position: absolute;
            bottom: 20px;
            left: 20px; }
        .profile-page .cover-holder .profile-info label {
            width: 75px;
            height: 75px;
            margin-right: 15px;
            float: left;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        .profile-page .cover-holder .profile-info label img {
            width: 75px;
            height: 75px;
            margin-right: 15px;
            border: 3px solid #ffffff;
            float: left;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        .profile-page .cover-holder .profile-info .sub {
            float: left;
            margin-top: 7px; }
        .profile-page .cover-holder .profile-info .sub .name {
            color: #ffffff;
            font-size: 24px;
            font-weight: 600; }
        .profile-page .cover-holder .profile-info .sub .detail {
            color: #fff;
            font-size: 13px;
            margin-top: 3px; }
        .profile-page .cover-holder .profile-info .sub .detail .fa {
            margin-left: -3px;
        }
        .img-container {
            position: relative;
            display: inline-block; /* added */
            overflow: hidden; /* added */
        }

        .mg-container img {width:100%;} /* remove if using in grid system */

        .img-container:hover a {
            opacity: 1; /* added */
            top: 0; /* added */
            background: rgba(255, 255, 255, .5);
            cursor: pointer;
        }
        /* added */
        .img-container a {
            display: block;
            position: absolute;
            top: -100%;
            opacity: 0;
            left: 0;
            bottom: 0;
            right: 0;
            text-align: center;
            color: inherit;
        }
        .img-container:hover a i {
            top: 50%;
            position: absolute;
            left: 0;
            right: 0;
            transform: translateY(-50%);
        }
    </style>
@endpush
@push('js')
    <script>
        function readURL(input,callback) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = callback;
                    // reader.onload = function (e) {
                    //     $(imgClass).attr('src', e.target.result);
                    // }

                }
            reader.readAsDataURL(input.files[0]);

        }

        $("#picInp").change(function() {
            readURL(this,function (e) {
                $(".pic").attr('src', e.target.result);
            });
        });
        $("#cover").change(function() {
            readURL(this,function (e) {
                $(".cover-img").css('background-image', 'url(' + e.target.result + ')');
            });
        });
    </script>

@endpush
