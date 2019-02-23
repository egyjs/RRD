@inject('function', 'App\Http\Controllers\Functions')
@extends("layouts.app")
@push("js")
    <script>
        $("#contact").remove();
        $("footer").remove();
        $('.tab-link1').on('click', function (event) {
            // Prevent url change
            event.preventDefault();
            // `this` is the clicked <a> tag
            var target = $('[href="' + this.hash + '"]');
            // opening tab
            target.trigger('click');
            // scrolling into view
            target[0].scrollIntoView(true);
        });
    </script>
@endpush
@section("page")
    <div class="page">
        <div class="container bg-white">
            <div class="row">
                <div class="col-md-10">
                    <div class="pt-2">
                        <h2 class="title p-3 m-0 text-primary">
                            <img style="height: 40px" src="{{ asset('main/img/logo.svg') }}"> User View Default Page
                        </h2>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="p-4">
                        <a href="{{ route('CVview') }}" class="btn bg1 text-white">Add CV</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text m-md-4 mr-md-4">
                        <p class="ml-md-4">
                            Hi <b>{{ $pageTitle ?? "Awesome User"}}</b> <br>
                            It Seems That Your Are New In Our Team, Or You Don't Know About This Awesome Feature
                            <br>
                            Anyway We Will Explain Every Thing Here <i class="twa twa-sweat-smile"></i>
                        </p>
                        <h2>First: What's User View ?</h2>
                        <p class="ml-md-4">
                            This Feature Make Our Team Able To Design Their Own Portfolio And Host It In Our Web
                            Site and
                            get your own CV <br>
                        </p>
                        <ul>
                            <li>
                                <b> But For What We Made This Thing </b>
                                <p>First To Save Their Money <br>
                                    We Didn't Need Them To Waste Their Money On Buying Host And Domain <br> They Can
                                    Use <i
                                            class="twa twa-moneybag"></i> On SomeThing Useful
                                    <br><br>
                                    Our Team Work As Apart Time Not A fullTime So If They Need To Apply For A
                                    FullTime Jop
                                    In Any Company They Will Ask bout Your <b>Portfolio</b>
                                    So You Can Give Them Your WebSite Link E.g :
                                    <small><code> {{ url("/") }} </code></small>
                                    . <br>
                                    <br>
                                    Not Only Give Them Your Website Link, We Are Always Looking For The Gifted
                                    People In Our
                                    Team Or Outside<br>
                                    So The Best Portfolio Will Upload In Our Website Will Be Sent To National
                                    Companies To
                                    employ Him as A Full Time
                                </p>
                                <ul>
                                    <li>
                                        <b>But How Can It Help Them Applying For A jop In Any Company</b>
                                        <p>
                                            First It's Secure URL <i class="twa twa-lock"></i> <br>
                                            Second It Showes That You Had Worked In A Team <i
                                                    class="icofont-group"></i>
                                            So You Can Quickly Adapt With The Company Team
                                            <br>
                                            Third It Gives You A Work Experince That All Companies are Requiring
                                            Form You
                                        </p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <h2>Second How Can I Use This Awesome Service</h2>
                        <l>
                            <li>
                                First You Need To Be A Member In Our Team, So Apply <a
                                        href="{{ route('home.hr') }}">Here</a> If You Not
                            </li>
                            <li>
                                Then Go <a href="/docs">Here</a> To Read Documentation
                            </li>
                        </l>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("css")
    <link rel="stylesheet" href="{{ asset('main/css/twemoji-awesome.css') }}">
    <style>
        a.active {
            color: #fff;
            background-color: #f4511e !important;
        }

        a.nav-link {
            color: #f4511e;
        }

        .page {
            background-image: url("https://scontent-cai1-1.xx.fbcdn.net/v/t1.0-9/47323901_960765417462948_1787421146413531136_n.png?_nc_cat=106&_nc_eui2=AeFl0PrXQKXN5K-WvDvCMQcVfZUpiGPhl-vaOyFETLs0Yeav6hbeg0tXSj9U2FL2lCwg5upIZMVsOID4NloflOgmXG37le80fLcaZqhs-M1qMg&_nc_ht=scontent-cai1-1.xx&oh=c83411f8d45c4120a943bc4dc90aa08c&oe=5C6582AB");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            padding-bottom: 60px;
        }

        .container {
            position: relative;
            top: 25px;
        }

        .text {
            font-size: 18px
        }
    </style>
@endpush
