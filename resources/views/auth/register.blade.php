@extends("layouts.auth")

@section("page")
    <div class="card">

                <div class="card-header center-align">
                    <h5><i class="icofont-sign-in red-text"></i> Register</h5>
                </div>


                <div class="card-header center-align white h3">
                    <img src="{{ asset('main/img/logo.svg') }}" style="width: 50px;height: 100px">
                    <span class="text-primary">C</span>asco <span class="text-primary">C</span>ode
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Login') }}" autocomplete="nope">
                        @csrf
                        @if ($errors->any())
                            <span class="row red-text">
                            @foreach($errors->all() as $er )
                                    <strong>{{ $er }}</strong>
                                @endforeach
                        </span>
                        @endif
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="icofont-user-alt-5 prefix"></i>
                                <input id="fullname" type="text" class="{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname"
                                       value="{{ $data->fullname ?? "" }}" required>
                                <label for="fullname">Full Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="icofont-user prefix"></i>
                                <input id="UserName" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                       required>
                                <label for="UserName">UserName</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="icofont-email prefix"></i>
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ $data->email ?? "" }}" required>
                                <label for="email">Email Address</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="icofont-key prefix"></i>
                                <input id="key" type="number" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="RegisterCode"
                                       value="" required>
                                <label for="key">Registration Code</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="icofont-lock prefix"></i>
                                <input id="password" type="password" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password"
                                       value="" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="icofont-ui-password prefix"></i>
                                <input id="password" type="password" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password_confirmation"
                                       value="" required>
                                <label for="password_confirmation">Password Confirmation</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 col-sm-12">
                                <button type="submit" class="btn btn-primary red">
                                    {{ __('register') }}
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 ">
                                <a class="" href="{{ route('login') }}">
                                    {{ __('Have An Account? Login') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
