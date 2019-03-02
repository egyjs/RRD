<div class="col-lg-4 sidebar">
    <div class="single-widget search-widget">
        <form class="example" action="#" style="margin:auto;max-width:300px">
            <input type="text" placeholder="Search Posts" name="search2">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>


        <div class="single-widget protfolio-widget">
        <img class="img-fluiNewsletterd" src="{{ ($singlePost_widget->thumbnail) }}"  style="max-width: 100%; max-height: 200px" alt="">
        <a href="#">
            <h4>{{ $singlePost_widget->title }}</h4>
        </a>
        <div class="desigmation">
            <p>{{ $singlePost_widget->writer->fullname }}</p>
        </div>
        <p>
            {{ $function->shorter($singlePost_widget->content,150) }}.
        </p>
        <ul>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a href="#"><i class="fa fa-behance"></i></a></li>
        </ul>
    </div>
    {{----}}
    {{--<div class="single-widget popular-posts-widget">--}}
        {{--<h4 class="title">Popular Posts</h4>--}}
        {{--<div class="blog-list ">--}}
            {{--<div class="single-popular-post d-flex flex-row">--}}
                {{--<div class="popular-thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/r1.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="popular-details">--}}
                    {{--<a href="blog-details.html">--}}
                        {{--<h4>Space Final Frontier</h4>--}}
                    {{--</a>--}}
                    {{--<p class="text-uppercase">02 hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-popular-post d-flex flex-row">--}}
                {{--<div class="popular-thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/r2.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="popular-details">--}}
                    {{--<a href="blog-details.html">--}}
                        {{--<h4>The Amazing Hubble</h4>--}}
                    {{--</a>--}}
                    {{--<p class="text-uppercase">02 hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-popular-post d-flex flex-row">--}}
                {{--<div class="popular-thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/r3.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="popular-details">--}}
                    {{--<a href="blog-details.html">--}}
                        {{--<h4>Astronomy Astrology</h4>--}}
                    {{--</a>--}}
                    {{--<p class="text-uppercase">02 hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="single-popular-post d-flex flex-row">--}}
                {{--<div class="popular-thumb">--}}
                    {{--<img class="img-fluid" src="img/blog/r4.jpg" alt="">--}}
                {{--</div>--}}
                {{--<div class="popular-details">--}}
                    {{--<a href="blog-details.html">--}}
                        {{--<h4>Asteroids telescope</h4>--}}
                    {{--</a>--}}
                    {{--<p class="text-uppercase">02 hours ago</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <div class="single-widget category-widget">
        <h4 class="title">Post Categories</h4>
        <ul>
            <li><a href="#" class="justify-content-between align-items-center d-flex">
                    <p>Techlology</p> <span>37</span>
                </a></li>

        </ul>
    </div>

    {{--<div class="single-widget newsletter-widget">--}}
        {{--<h4 class="title">Newsletter</h4>--}}
        {{--<div id="mc_embed_signup">--}}
            {{--<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="">--}}
                {{--<div class="form-group" style="width: 100%">--}}
                    {{--<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">--}}
                    {{--<div style="position: absolute; left: -5000px;">--}}
                        {{--<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">--}}
                    {{--</div>--}}

                    {{--<button class="primary-btn text-uppercase">--}}
                        {{--Subscribe Now--}}
                        {{--<span class="lnr lnr-arrow-right"></span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="info"></div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}

</div>
