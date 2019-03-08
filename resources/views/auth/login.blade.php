@extends("layouts.auth")

@section("page")
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
        @if ($errors->any())
            <span class="row red-text">
                            @foreach($errors->all() as $er )
                    <strong>{{ $er }}</strong>
                @endforeach
                        </span>
        @endif
        @if (\Session::has('status'))
            <div class="alert alert-info">{{ \Session::get('status') }}</div>
        @endif

        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}"
                       name="username"
                       value="{{ old('email') }}" required>
                <label for="email">UserName Or Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password"
                       value="{{ old('password') }}" required>
                <label for="password">Password</label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-check">
                    <label>
                        <input type="checkbox" class="red" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }} />
                        <span>{{ __('Remember Me') }}</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 col-sm-12">
                <button type="submit" class="btn btn-primary red">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <a class="" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            </div>
            <div class="col-md-12 col-sm-12 ">
                <a class="" href="{{ route('register') }}">
                    {{ __('Create Account') }}
                </a>
            </div>
        </div>
    </form>
@endsection
