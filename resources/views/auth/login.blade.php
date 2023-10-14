@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Cn8YGwJFZzVHhcTYKjWl/kXtvvWh5y2Y5hKc5g0f6KjnwmbNGQIbGdE6ilwoVXUcO6E+V7L0z6q3KjwFpTEN1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" integrity="sha512-jtKpP/pMfhaZpBPlG/mX9zpRJS31C5l5Ln5jPpl5b+cr0W5h0bLdZ2QWyckF1+GsLww5C5hGmccz5w/mRuZZnA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Awesome CSS CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-F/QwLsR15brc8WHvSdK3VqD+xsiCJ6EgUvMWihyH2kU1iCBU0W8Bv61CZcnJfHlXpBx63hLPSkt5h5joCsdAFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-g/LYijYTrRnsb/jK04mzw9mJZMZgq3lG2QD6UwG6U+yTjbT8r6r+J6kN9sBEBWREksklIvUgE0V7O+nvHSlJYw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap JavaScript CDN link (optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/js/bootstrap.bundle.min.js" integrity="sha512-cmztMpyu88bVnCdySgS7VQ+w9bT9Tvx11qABxRUItD+8I6kzU6H2wvapKZ/ZeQJly2lif7fBldtj5Z5ue30biA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>

<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form method="POST" action="{{ route('apprenant.gerer.login1') }}">
                @csrf
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <p class="lead fw-normal mb-0 me-3">Sign in with</p>
              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>

              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>

              <button type="button" class="btn btn-primary btn-floating mx-1">
                <i class="fab fa-linkedin-in"></i>
              </button>
            </div>

            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0">Or</p>
            </div>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @if ($errors->has('email'))
    <span class="text-danger">{{ $errors->first('email') }}</span>
@endif

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form3Example3" name="email"   class="form-control form-control-lg"
              value="{{ old('email') }}"  placeholder="Enter a valid email address" required />
              <label class="form-label" for="form3Example3">Email address</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="form3Example4" name="password" class="form-control form-control-lg"
              value="{{ old('password') }}" placeholder="Enter password" required  autofocus/>
              <label class="form-label"  for="form3Example4">Password</label>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

            <div class="d-flex justify-content-between align-items-center">
              <!-- Checkbox -->
              <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                  Remember me
                </label>
            </div>

                @if (Route::has('password.request'))
                <a class="text-body" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('admin.apprenant.create') }}"
                  class="link-danger">Register</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
    <div
      class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- Copyright -->
      <div class="text-white mb-3 mb-md-0">
        Copyright agil group © 2020. All rights reserved.
      </div>
      <!-- Copyright -->

      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
  </section>

@endsection













