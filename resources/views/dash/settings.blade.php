@extends('layouts.dash')
@inject('function', 'App\Http\Controllers\Functions')

@section('main')
    <div class="container-fluid">
        @if ( $errors->any() )
            <div class="col-md-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Error: You Have A Mistaje With Data You Entered
                        </h2>
                    </div>
                    <div class="body">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
            @if (\Session::has('status'))
                <div class="alert alert-info">{{ \Session::get('status') }}</div>
            @endif
    </div>
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="card" method="post" action="{{ route('dash.settings.post') }}" novalidate>
                    <div class="header">
                        <h2 class="pull-left"> Settings </h2>
                        <div class="clearfix">
                            <input type="submit" class="btn btn-primary pull-right "  name="button_1"value="Update">
                        </div>
                    </div>
                    <div class="body" >
                        @csrf

                        <h3>main info</h3>
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Site Name <span class="required">*</span></label>
                                    <div class="form-line">
                                        <input autofocus type="text" value="{{ config('app.name') }}" required
                                               class="form-control" name="siteTitle" placeholder="Site name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Short descriptions <span
                                            class="required">*</span></label>
                                    <div class="form-line">
                                        <textarea required
                                                  class="form-control" name="short_desc"
                                                  placeholder="Short descriptions">{{ config('site.short_desc') }}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Long descriptions </label>
                                    <div class="form-line">
                                        <textarea
                                            class="form-control" name="long_desc"
                                            placeholder="Long descriptions">{{ config('site.long_desc') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <h3>Socials</h3>
                        <div class="row clearfix">
                            @foreach((config('site.social')) as $name => $url)
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>name:</label>
                                        <label class="form-line">
                                            <input  type="text" value="{{ $name }}" required
                                                   class="form-control" name="social_name[]">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label>link:</label>

                                        <label class="form-line">
                                            <input  type="text" value="{{ $url }}" required
                                                   class="form-control" name="social_url[]">
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <span class="addsoc"></span>
                            <button title="Add more socials" type="button" class="btn btn-warning" id="addsocbtn"><i
                                    class="fa fa-plus"></i></button>

                        </div>
                        <hr>

                        <h3>Menu</h3>
                        <div class="row clearfix">
                            @foreach((config('site.menu')) as $name => $url)

                                <div @if($url == "true") style="display: none;"  @endif
                                                                     class="col-md-2">
                                    <div class="form-group">
                                        <label>name:</label>
                                        <label class="form-line">
                                            <input type="text" value="{{ $name }}"
                                                   class="form-control" name="menu_name[]" >
                                        </label>
                                    </div>
                                </div>
                                <div  @if($url == "true") style="display: none;"  @endif class="col-md-10">
                                    <div class="form-group">
                                        <label>link:</label>

                                        <label class="form-line">
                                            <input readonly type="text"
                                                 value='{{ $url }}'
                                                   class="form-control" name="menu_url[]" >
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            <span class="addpg"></span>
                            <button title="Add more pages" type="button" class="btn btn-warning" id="addpgbtn">
                                <i class="fa fa-plus"></i></button>

                        </div>
                        <hr>


                        <div class="clearfix">
                            <input type="submit" class="btn btn-primary pull-right " value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('dash/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
    <script>
        $('#addsocbtn').click(function () {
            $('.addsoc').before('                                <div class="col-md-2">' +
                '                                    <div class="form-group">' +
                '                                        <label>name:</label>' +
                '                                        <div class="form-line">' +
                '                                            <input  type="text" value="" ' +
                '                                                   class="form-control" name="social_name[]" >' +
                '                                        </div>' +
                '                                    </div>' +
                '                                </div>' +
                '                                <div class="col-md-10">' +
                '                                    <div class="form-group">' +
                '                                        <label>link:</label>' +
                '' +
                '                                        <div class="form-line">' +
                '                                            <input  type="text" value="" ' +
                '                                                   class="form-control" name="social_url[]">' +
                '                                        </div>' +
                '                                    </div>' +
                '                                </div>')
        });

        $('#addpgbtn').click(function () {
            $('.addpg').before('                                <div class="col-md-2">' +
                '                                    <div class="form-group">' +
                '                                        <label>name:</label>' +
                '                                        <div class="form-line">' +
                '                                            <input  type="text" value="" ' +
                '                                                   class="form-control" name="menu_name[]" >' +
                '                                        </div>' +
                '                                    </div>' +
                '                                </div>' +
                '                                <div class="col-md-10">' +
                '                                    <div class="form-group">' +
                '                                        <label>link:</label>' +
                '' +
                '                                        <div class="form-line">' +
                '                                            <input  type="text" value="" ' +
                '                                                   class="form-control" name="menu_url[]">' +
                '                                        </div>' +
                '                                    </div>' +
                '                                </div>')
        });
    </script>
@endpush
@push('css')

    <style>
        input:read-only{
            background: #eeeeee !important;
            padding: 9px !important;
        }
        .required {
            color: red;
        }
    </style>
@endpush

