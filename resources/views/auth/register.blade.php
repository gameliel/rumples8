@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <a class="navbar-brand" href="/"><img src="{{ asset('assets/img/SVG/Asset 1RUMPLES.svg') }}" style="width: 50%;" alt=""></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img" style="background-image: url({{ asset('assets/images/bg-1.jpg')}});">
              </div>
                    <div class="login-wrap p-4 p-md-5">
                  <div class="d-flex">
                      <div class="w-100">
                          <h3 class="mb-4">Register</h3>
                      </div>
                    <div class="w-100">
                        <p class="social-media d-flex justify-content-end">
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                        </p>
                    </div>
                  </div>
                  <form method="POST" action="{{ route('register') }}" class="signin-form">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="label" for="name">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">{{ __('Password') }}</label>
                        <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" class="form-control" placeholder="Password" type="password" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">{{ __('Register') }}</button>
                    </div>
                    <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                                <label for="remember" class="checkbox-wrap checkbox-primary mb-0">{{ __('Remember Me') }}
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                </form>
                <p class="text-center">Not a member? <a href="{{ route('login') }}">Sign In</a></p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
