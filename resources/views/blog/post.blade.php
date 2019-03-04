@extends("layouts.app")

@section('page')
    <div class="col-lg-12">
        <div class="main_blog_details">
            {{--<img class="img-fluid mb-3" src="{{ $image }}" alt="">--}}
            <div class="card" style="max-width: 100%">

                <div class="card-header">
                    <h4>{{ $post->title }}</h4>
                    <div class="user_details">
                        <div class="float-left">
                            @foreach($post->tagNames() as $tag)
                                <a href="#">{{ $tag }}</a>
                            @endforeach
                        </div>
                        <div class="float-right">
                            <div class="media">
                                <div class="media-body">
                                    <h5>{{ $post->writer->fullname }}</h5>
                                    <p>{{  date("d M Y h:i a", strtotime($post->created_at)) }}</p>
                                </div>
                                <div class="d-flex">
                                    <img src="{{ $post->writer->img }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! $post->content !!}</div>
                <div class="card-footer">
                    <div class="news_d_footer">
                        {{--<a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>--}}
                        <div class="justify-content-center ml-auto" ><i class="lnr lnr lnr-bubble"></i> <a href="{{ url()->current().'#disqus_thread' }}">0 comment</a> </div>
                        <div class="news_socail ml-auto">
                            @foreach((config('site.social')) as $name => $url)
                                <a href="{{http($url)}}" target="_blank"><i class="fa fa-{{$name}}"></i></a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="navigation-area">
                <div class="row">
                        @if($perv)
                            <div
                        class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                        {{--<div class="thumb">--}}
                            {{--<a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>--}}
                        {{--</div>--}}
                        <div class="arrow">
                            <a href="{{ route('blog.post',$perv->slug) }}"><span class="lnr text-white lnr-arrow-left"></span></a>
                        </div>
                        <div class="detials">
                            <p>Prev Post</p>
                            <a href="{{ route('blog.post',$perv->slug) }}">
                                <h4>{{ $perv->title }}</h4>
                            </a>
                        </div>
                    </div>
                        @endif
                        @if($next)
                            <div
                        class="col-lg-6 col-md-6 col-12
                        nav-right pull-right flex-row d-flex justify-content-end align-items-center">
                        <div class="detials">
                            <p>Next Post</p>
                            <a href="{{ route('blog.post',$next->slug) }}">
                                <h4>{{ $next->title }}</h4>
                            </a>
                        </div>
                        <div class="arrow">
                            <a href="{{ route('blog.post',$next->slug) }}"><span class="lnr text-white lnr-arrow-right"></span></a>
                        </div>
                    </div>
                        @endif
                </div>
            </div>
                </div>
            </div>

            <div class="card mb-3 mt-3">
                <div class="card-body">
                    <div id="disqus_thread"></div>
                </div>
            </div>
        </div>
    </div>
        @endsection
        @push('js')
            <script>

                /**
                 *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                 *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                var disqus_config = function () {
                    this.page.url = "{{ url()->current() }}";  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = "pro-{{ $post->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                };

                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://rrd-2.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>        @endpush
        @push('css')
                <style>
                img {
                    max-width: 100%;
                }

                .img-fluid {
                    background: #bdbdbd;
                    padding: 12px;
                }

                .about-content {
                    color: white;
                    mix-blend-mode: difference;
                    text-align: center
                }

            </style>
    @endpush
