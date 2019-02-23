@extends("layouts.app")

@section('page')
    @include("home.topnav")

    <div class="page bg-light pt-4 pb-4">
        <div class="container mt-4 mb-2 bg-white">
            <div id="blog" class="pb-4">
                <div class="container">
                    <h2 class="pt-5">Our Projects</h2>
                    <div class="row">
                        @forelse($pros as $pro)
                            <div class="col-md-4">
                                <div class="card  border-0 rounded shadow">
                                    <img style="height: 200px" class="rounded-top img-fluid"
                                         src="{{ $pro->thumbnail }}">
                                    <div class="card-body">
                                        <h5>
                                            <a href="{{ route('home.single.project',$pro->slug) }}"
                                               class="btn-link"> {{ $pro->title }} </a>
                                        </h5>
                                        <p>{{ substr($pro->description,0,220) }}</p>
                                        <a href="{{ route('home.single.project',$pro->slug) }}"
                                           class="btn-link text-primary decor underline border-dark">Read
                                            More</a>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="col-md-12 text-center p-3">
                                <h2>Ops! There's No Projects Yet :-(</h2>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection