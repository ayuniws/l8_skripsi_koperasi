@extends('layouts.template-login')
@section('content')
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <section class="col-md-4 offset-md-4 col-8 offset-2 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 row mb-0">
          <div class="card-header no-border pb-0">
            <div class="card-title text-center">
              <img src="{{ asset('modernadmin/app-assets/images/logo/logokoperasi1.png') }}" alt="branding logo">
            </div>
            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
              {{-- <span>Untuk Mendaftar</span> --}}
            </h6>
          </div>
          <div class="card-content">
{{--             <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2">
              <span>Masukan Nama, Email dan Password</span>
            </p> --}}
            <div class="card-body pt-0">
              <form method="POST" class="form-horizontal" action="{{ route('register') }}" novalidate>@csrf
                <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                  <div class="form-control-position">
                    <i class="la la-user"></i>
                  </div>
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left">
                  <input type="email" class="form-control" id="email" name="email"  placeholder="Your Email Address"
                  required>
                  <div class="form-control-position">
                    <i class="la la-envelope-o"></i>
                  </div>
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password"
                  required>
                  <div class="form-control-position">
                    <i class="la la-key"></i>
                  </div>
                </fieldset>
                <fieldset class="form-group position-relative has-icon-left">
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Again"
                  required>
                  <div class="form-control-position">
                    <i class="la la-key"></i>
                  </div>
                </fieldset>
                <button type="submit" class="btn btn-info btn-block">Register</button>
              </form>
            </div>
          </div>
          <div class="card-footer pb-0">
            <p class="text-center">Already have an account ? <a href="{{ route('login') }}" class="card-link">Login</a></p>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
  @endsection
