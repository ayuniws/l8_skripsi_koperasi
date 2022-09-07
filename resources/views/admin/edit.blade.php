@extends('layouts.template')
@section('sidemenu')
  @include('admin.sidemenu')
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Form Tambah Pengguna</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="card-text">
                    <form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}" class="form" novalidate>@csrf
                        @method('PUT')
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="nrp">NRP</label>
                              <input type="text" id="nrp" class="form-control" value="{{ $pengguna->nrp }}" name="nrp" disabled>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Nama Lengkap</label>
                              <input type="text" id="name" class="form-control" value="{{ $pengguna->name }}" name="name">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">E-mail</label>
                              <input type="text" id="email" class="form-control" value="{{ $pengguna->email }}" name="email">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="level">Level</label>
                              <select id="level" name="level" class="form-control">
                                <option value="{{ $pengguna->level }}">
                                    @if($pengguna->level == 'admin') Admin </option> 
                                    <option value="user">User Biasa</option>
                                    @elseif ($pengguna->level == 'user')User Biasa </option> 
                                    <option value="admin">Admin</option>
                                    @endif
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                        </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                              <option value="{{ $pengguna->status }}">
                            @if($pengguna->status == 'enabled') Enabled </option> 
                            <option value="disabled">Disabled</option>
                            @elseif ($pengguna->status == 'disabled') Disabled </option> 
                            <option value="enabled">Enabled</option>
                            @endif
                            </select>                            
                          </div>
                      <div class="form-actions right">
                        <a href="{{ URL::previous() }}" class="btn btn-warning btn-min-width">Back</a>                        {{-- </button> --}}
                        <button type="submit" class="btn btn-primary btn-min-width">
                          Save
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </section>
        <!-- // Basic form layout section end -->
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
@endsection