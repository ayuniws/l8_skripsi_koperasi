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
          <h4 class="text-uppercase">Profil Anggota</h4>
          {{-- <p>User profile cards with border & shadow variant.</p> --}}
        </div>
        <div class="col-xl-4 col-md-6 col-12">
          <div class="card">
            <div class="text-center">
              <div class="card-body">
                @if(empty($anggota->foto_anggota)) <img src="{{ asset('modernadmin/app-assets/images/portrait/medium/avatar-6.png') }} " class="rounded-circle  height-150" alt="Card image"> @else <img src="{{asset('/foto_anggota/'.$anggota->foto_anggota)}}" class="rounded-circle  height-150" alt="Card image"> @endif
              </div>
              <div class="card-body">
                <h4 class="card-title">{{ $anggota->nama_anggota }}</h4>
                <h6 class="card-subtitle text-muted">{{ ucfirst($anggota->nrp) }}</h6>
              </div>
            </div>
            <div class="list-group list-group-flush">
              <div class="list-group-item"><i class="ft-map"></i> {{ ucfirst($anggota->tempat_lahir).', '.$anggota->tgl_lahir }}</div>
              <div class="list-group-item"><i class="la la-briefcase"></i> {{ $anggota->bagian }}</div>
              <div class="list-group-item"> <i class="ft-map-pin"></i> {{ $anggota->alamat_anggota }}</div>
              <div class="list-group-item"><i class="la la-briefcase"></i> {{ $anggota->jenis_kelamin === 'L' ? 'Laki-Laki':'Perempuan' }}</div>
              <div class="list-group-item"><i class="ft-mail"></i> {{ $anggota->email }}</div>
              <div class="list-group-item"><i class="ft-phone"></i> {{ $anggota->no_telepon }}</div>
              <div class="list-group-item"><i class="ft-user-plus"></i> {{ ucfirst($anggota->level) }}</div>
              <div class="list-group-item"><i class="ft-user-check"></i> {{ ucfirst($anggota->jabatan) }}</div>
            </div>
            <div class="form-actions left">
                <a href="{{ URL::previous() }}" class="btn btn-warning btn-min-width">Back</a>
            </div>
          </div>
        </div>
      </section>
      </div>
    </div>
</div>
@endsection
