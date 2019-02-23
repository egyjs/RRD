@extends("layouts.app")
@section("page")
    @include("home.topnav")
    <div class="page">
        <div id="about" class="bg2 pb-5">
            <div class="container">
                <h2 class="pt-5">Our Services</h2>
                <p class="text-muted ">
                    Here You Can See Our Services And Request Any One Of Them
                </p>
                <div class="row">
                    @foreach($servs as $serv)
                        <div class="col-md-4">
                            <div class="item shadow p-3 mb-5 bg-white rounded text-center">
                                @if(filter_var($serv->icon , FILTER_VALIDATE_URL))
                                    <img class="rounded-circle mb-2"  src="{{ $serv->icon }}" width="100">
                                @else
                                    <div class="icon">
                                        <i class="{{ $serv->icon }}"></i>
                                    </div>
                                @endif
                                <div class="title">
                                    <p>{{ $serv->title }}</p>
                                </div>
                                <div class="desc">
                                    {{ $serv->content }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection