@extends('layouts.auth')

@section('page')
    <div class="card">

        <div class="card-header center-align">
            <h5><i class="icofont-login red-text"></i> Login</h5>
        </div>

        <div class="card-header center-align white h2">
            <img src="{{ asset('main/img/logo.svg') }}" style="width: 50px;height: 100px">
            <span class="text-primary">C</span>asco <span class="text-primary">C</span>code
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                @csrf
                @if ($errors->any())
                    <span class="row red-text">
                            @foreach($errors->all() as $er )
                            <strong>{{ $er }}</strong>
                        @endforeach
                        </span>
                @endif
                @if (isset($status))
                    <span class="row red-text">
                        <strong>{{ $status }}</strong>
                    </span>
                @endif

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn" style="background-color: #f4511e">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
