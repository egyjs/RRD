@extends("layouts.auth")

@section("page")
    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <input hidden type="hidden" name="r" value="{{ $data['r'] }}">
                        @if ($errors->any())
                            <span class="row red-text">
                            @foreach($errors->all() as $er )
                                    <strong>{{ $er }}</strong>
                                @endforeach
                        </span>
                        @endif
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="fullname" type="text" class="{{ $errors->has('fullname') ? ' is-invalid' : '' }}" name="fullname"
                                       value="{{ $data->fullname ?? "" }}" required>
                                <label for="fullname">Full Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="UserName" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                       required>
                                <label for="UserName">UserName</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                       value="{{ $data->email ?? "" }}" required>
                                <label for="email">Email Address</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password"
                                       value="" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password_confirmation" type="password" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password_confirmation"
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
@endsection
