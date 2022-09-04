@extends('layouts.template-login')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    <img src="{{ asset('modernadmin/app-assets/images/logo/logokoperasi.png') }}" alt="branding logo">
                  </div>
                  <p class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Masukan Username dan Password Anda</span>
                  </p>
                </div>
                <div class="card-content">
                  <div class="card-body pt-0">
                    <form method="POST" class="form-horizontal" action="{{ route('login') }}" novalidate>@csrf
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control input-lg" name="nrp" id="nrp" placeholder="Your Username"
                        required>
                        <div class="form-control-position">
                          <i class="la la-user"></i>
                        </div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Enter Password"
                        required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                      <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                    </form>
                  </div>
                  <div class="card-body pb-0">
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  @endsection
