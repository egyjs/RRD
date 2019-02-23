@extends("layouts.app")

@section('page')

    @include("home.topnav")

    <div class="page bg-light pb-4" id="singlepost">
        <div class="header">
            <img class="img-fluid rounded-top"
                 src="{{ $pro->thumbnail }}">
            <div class="container info">
                <h1 class="title box">{{ $pro->title }}</h1>
                <h5 class="box"><i class="icofont icofont-man-in-glasses"></i> {{ $pro->writer->fullname }}</h5>
            </div>
        </div>
        <div class="container mt-2 mb-2">
            <div class="card pt-4">
                <div class="card-body content">
                    <h1 class="title"><i style="color: #ff8431" class="icofont icofont-heading"></i> {{ $pro->title }}
                    </h1>
                    <p>
                        {!! $pro->content !!}
                    </p>
                </div>
                <div class="card p-2 mt-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <a href="" class="btn text-black-50">
                                    <i style="font-size: 20px;" class="icofont icofont-tag"></i>
                                </a>
                                @foreach($pro->tagNames() as $tag)
                                    <a href="" class="btn bg1 text-white">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('main/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/blog.css') }}">
@endpush