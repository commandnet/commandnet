@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <main class="form-signin w-100 m-auto">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <img class="mb-4" src="{{ asset('images/logo_login.png') }}" alt="">
              
                    <div class="form-floating">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" >{{ __('Email Address') }}</label>
                    </div>
                    <div class="form-floating">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <label for="password">{{ __('Password') }}</label>
                    </div>
                    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <button class="btn btn-primary w-100 py-2" type="submit">Anmelden</button>
                </form>
              </main>
        </div>
    </div>
</div>
@endsection
