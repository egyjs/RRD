<?php  /**
 * Created by A.El-zahaby.
 * User: root
 * Date: 3/15/19
 * Time: 3:49 PM
 */ ?>
@extends("layouts.app")

@section('page')
    <div class="container" >
        <h3 id="posts">Posts under TAG :[{{ $tag }}] or <a href="#projects">PROJECTS</a></h3>
        <hr>
        <div class="row" >
            @foreach($posts as $post)
                <div class="col-md-6" id="post-{{ $post->id }}">
                    <div class="single-post-item short">
                        <figure>
                            <img class="post-img img-fluid" src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
                        </figure>
                        <h3>
                            <a href="{{ route('blog.post',$post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        <p>{{ shorter($post->content,120) }}</p>
                        <a href="{{ route('blog.post',$post->slug) }}" class="primary-btn text-uppercase mt-15">continue Reading</a>
                        <div class="post-box">
                            <div class="d-flex">
                                <div>
                                    <a href="#">
                                        <img src="{{ asset('logoc.png') }}" width="50px" alt="">
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
                                                <a href="#" >
                                                    <span class="lnr lnr-tag"></span>
                                                    {{ implode(' & ',$post->tagNames())  }}

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
                </div>
            @endforeach
        </div>
        <h3 id="projects">Projects under TAG :[{{ $tag }}] or <a href="#posts">posts</a></h3>
        <hr>
        <div class="row">
            @foreach($projects as $pro)
                <div class="col-md-6" id="project-{{ $pro->id }}">
                    <div class="single-post-item short">
                        <figure>
                            <img class="post-img img-fluid" src="{{ $pro->thumbnail }}" alt="{{ $pro->title }}">
                        </figure>
                        <h3>
                            <a href="{{ route('project.post',$pro->slug) }}">{{ $pro->title }}</a>
                        </h3>
                        <p>{{ shorter($pro->content,120) }}</p>
                        <a href="{{ route('project.post',$pro->slug) }}" class="primary-btn text-uppercase mt-15">continue Reading</a>
                        <div class="post-box">
                            <div class="d-flex">
                                <div>
                                    <a href="#">
                                        <img src="{{ asset('logoc.png') }}" width="50px" alt="">
                                    </a>
                                </div>
                                <div class="post-meta">
                                    <div class="meta-head">
                                        <a href="#">{{ $pro->writer->fullname }}</a>
                                    </div>
                                    <div class="meta-details">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <span class="lnr lnr-calendar-full"></span>
                                                    {{  date("d M Y", strtotime($pro->created_at)) }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <span class="lnr lnr-tag"></span>
                                                    {{ implode(' & ',$pro->tagNames())  }}

                                                </a>
                                            </li>
                                            <li>
                                                <div >
                                                    <span class="lnr lnr-bubble"></span>
                                                    <a href="{{ route("project.post",$pro->slug).'#disqus_thread' }}">00 Comments</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@push('js')
<script>
    $(".main-body").html($(".main-body").html().replace(/{{$tag}}/gi,'<b>$&</b>'));
</script>
@endpush
