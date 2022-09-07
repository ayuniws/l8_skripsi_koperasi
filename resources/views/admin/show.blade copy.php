@extends('layouts.template')
@section('sidemenu')
  @include('admin.sidemenu')
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
      <!-- User Profile Cards -->
      <section id="user-profile-cards" class="row mt-2">
        <div class="col-12">
          <h4 class="text-uppercase">Profil Pengguna</h4>
          {{-- <p>User profile cards with border & shadow variant.</p> --}}
        </div>
        <div class="col-xl-4 col-md-6 col-12">
          <div class="card">
            <div class="text-center">
              <div class="card-body">
                <img src="{{ asset('modernadmin/app-assets/images/portrait/medium/avatar-6.png') }} " class="rounded-circle  height-150"
                alt="Card image">
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ $pengguna->name }}</h4>
                <h6 class="card-subtitle text-muted">{{ ucfirst($pengguna->nrp) }}</h6>
              </div>
            </div>
            <div class="list-group list-group-flush">
              <div class="list-group-item"><i class="la la-briefcase"></i>Divisi TI</div>
              <div class="list-group-item"><i class="ft-mail"></i> {{ $pengguna->email }}</div>
              <div class="list-group-item"><i class="ft-check-square"></i>{{ ucfirst($pengguna->level) }}</div>
              <div class="list-group-item"> <i class="ft-message-square"></i> {{ $pengguna->status }}</div>
            </div>
          </div>
        </div>
      </section>
      </div>
    </div>
</div>
@endsection