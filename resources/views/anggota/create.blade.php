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
                  <h4 class="card-title" id="basic-layout-form">Form Tambah Anggota</h4>
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

                    <form method="POST" action="{{ route('anggota.store') }}" class="form" novalidate>@csrf
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">NRP</label>
                              <input type="text" id="nrp" class="form-control" placeholder="NRP" name="nrp">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Nama Lengkap</label>
                              <input type="text" id="name" class="form-control" placeholder="Last Name" name="name">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Telp</label>
                              <input type="text" id="telp" class="form-control" placeholder="telp" name="telp">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Email</label>
                              <input type="text" id="email" class="form-control" placeholder="email" name="email">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">Kelamin</label>
                              <select id="kelamin" name="kelamin" class="form-control">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                              </select></div>
                            </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">Level</label>
                              <select id="level" name="level" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="ketua">Ketua</option>
                                <option value="anggota">Anggota</option>
                              </select></div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="companyName">Alamat</label>
                          <textarea id="alamat" rows="5" class="form-control" name="alamat" placeholder="Alamat"></textarea>
                        </div>
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