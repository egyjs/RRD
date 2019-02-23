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
            </div>
            <div class="row">
                <div class="col-md-3 bg-white">
                    <h3>
                        Documentation
                    </h3>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                         aria-orientation="vertical">

                        <a class="nav-link tab-link active" id="v-pills-home-tab" data-toggle="pill"
                           href="#v-pills-home"
                           role="tab" aria-controls="v-pills-home" aria-selected="true">What Should I Have</a>
                        <a class="nav-link tab-link" id="v-pills-assets-tab" data-toggle="pill" href="#assets"
                           role="tab" aria-controls="assets" aria-selected="false">Requiring Assets</a>
                        <a class="nav-link tab-link" id="v-pills-messages-tab" data-toggle="pill"
                           href="#v-pills-messages"
                           role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                        <a class="nav-link tab-link" id="v-pills-settings-tab" data-toggle="pill"
                           href="#v-pills-settings"
                           role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                             aria-labelledby="v-pills-home-tab">
                            <div class="container bg-white">
                                <h2>Requirements</h2>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul>
                                            <li>
                                                HTML5 Portfolio But Contain Some Required Files Simple <a
                                                        href="">Here</a>
                                                <br><br>
                                                <h5>What Files Required In My Design ?</h5>
                                                <ul>
                                                    <li>
                                                        <b>screenshot.jpg </b> Which Has A Photo For Your Design , But
                                                        This File In Main Directory
                                                    </li>
                                                </ul>
                                                <br><br>
                                                <h5>
                                                    What's Next ?
                                                </h5>
                                                <p>All You Need Is To Follow The Next Instructions And Compress The
                                                    Final Theme And Upload It</p>
                                                <br><br>
                                                <a class="tab-link1" href="#assets">Requiring Assets</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="assets" role="tabpanel"
                             aria-labelledby="v-pills-assets-tab">
                            <div class="row bg-white">
                                <div class="container bg-whiite">
                                    <h2>Requiring Assets In Your Theme </h2>
                                    <p>
                                        to require any local assets in your theme you must do just one thing
                                        <br>
                                        just put  <code>{-path-}</code> before the path to asset file . something like this
                                        <br>
                                        <code>{{ '<img src="{-path-}/img/logo.png">' }}</code><br>
                                    </p>
                                    <p>
                                        this flag help our system to resolve th path for your asset file <br>
                                        Not Only This Flag We Made Go Next To Discover More Flags And It's Magic
                                        <i class="twa"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                             aria-labelledby="v-pills-messages-tab">
                            ...
                        </div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                             aria-labelledby="v-pills-settings-tab">
                            ...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("css")
    <link rel="stylesheet" href="{{ asset('main/css/twemoji-awesome.css') }}">
    <style>

        code {
            font-size: 87.5%;
            color: #e83e8c;
            word-break: break-word;
            background-color: rgba(27,31,35,.05);
            border-radius: 3px;
            font-size: 80%;
            margin: 0;
            padding: .2em .4em;
        }

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



        .text {
            font-size: 18px
        }

    </style>
@endpush
