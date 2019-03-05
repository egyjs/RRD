@extends("layouts.app")
@inject('function', 'App\Http\Controllers\Functions')

@section("page")
    <div class="col-lg-8 post-list">
        <!-- Start Post Area -->
        <section class="post-area">
            @foreach($posts as $post)
            <div class="single-post-item">
                <figure>
                    <img class="post-img img-fluid" src="{{ $post->thumbnail }}" alt="">
                </figure>
                <h3>
                    <a href="{{ route("blog.post",$post->slug) }}">{{ $post->title }}</a>
                </h3>
                <p>{{ $function->shorter($post->content,100) }}.</p>
                <a href="{{ route("blog.post",$post->slug) }}" class="primary-btn text-uppercase mt-15">continue Reading</a>
                <div class="post-box">
                    <div class="d-flex">
                        <div>
                            <a href="#">
                                <img src="{{ asset('logo.png') }}" width="90" height="90" alt="">
                            </a>
                        </div>
                        <div class="post-meta">
                            <div class="meta-head">
                                <a href="#">{{ $post->writer->fullname }}</a>
                            </div>
                            <div class="meta-details">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-calendar-full"></span>
                                            {{  date("d M Y", strtotime($post->created_at)) }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="lnr lnr-tag"></span>
                                            ({{ implode(' , ',$post->tagNames())  }})

                                        </a>
                                    </li>
                                    <li>
                                        <div >
                                            <span class="lnr lnr-bubble"></span>
                                            <a href="{{ route("blog.post",$post->slug).'#disqus_thread' }}">00 Comments</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
                {{ $posts->links() }}

        </section>
        <!-- End Post Area -->
    </div>
@endsection
@push('js')

@endpush
