
<!-- Start banner Area -->
<section class="banner-area">
    <div class="container box_1170">
        <div class
             ="row fullscreen d-flex align-items-center justify-content-center">
            <div class="banner-content text-center col-lg-8">
                <h1 id="h1banner">{{ config('site.short_desc') }}</h1>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start Post Silder Area -->
<section class="post-slider-area">
    <div class="container box_1170">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="owl-carousel active-post-carusel">
                    @foreach($slides as $slide)
                        <div class="post-box mb-30">
                            <div class="d-flex">
                                <div>
                                    <a href="{{ route('project.post',$slide->slug) }}">
                                        <img src="{{ $slide->thumbnail }}" style="width: 100px" alt="">
                                    </a>
                                </div>
                                <div class="post-meta">
                                    <div class="meta-head">
                                        <a href="{{ route('project.post',$slide->slug) }}">{{ $slide->title }}</a>
                                    </div>
                                    <div class="meta-details">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <span class="lnr lnr-calendar-full"></span>
                                                    {{  date("d M Y", strtotime($slide->created_at)) }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('projects') }}">
                                                    <span class="lnr lnr-picture"></span>
                                                    Project
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="lnr lnr-tag"></span>
                                                    {{ implode(' & ',$slide->tagNames())  }}
                                                </a>
                                            </li>
                                            <li>
                                                <div href="#">
                                                    <span class="lnr lnr-bubble"></span>
                                                    <a href="{{ route("project.post",$slide->slug).'#disqus_thread' }}">00 Comments</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <p>{{ $function->shorter($slide->content,100) }}.</p>
                            <div class="post-btn">
                                <a href="{{ route('project.post',$slide->slug) }}" class="primary-btn text-uppercase">Read More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Post Slider Area -->
