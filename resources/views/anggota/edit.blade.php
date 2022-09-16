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
                  <h4 class="card-title" id="basic-layout-form">Form Edit Pengguna</h4>
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
                    <form method="POST" action="" class="form" novalidate>@csrf
                        @method('PUT')
                            <div class="row icheck_minimal skin">
                              <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <fieldset>
                                        <label>
                                            <input type="checkbox" value="" id="add_login" name="add_login" checked>
                                            Buat Akun Login
                                        </label>
                                    </fieldset>
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput1">NRP</label>
                                  <input type="text" id="nrp" class="form-control" placeholder="NRP" name="nrp" value="{{ $anggota->nrp }}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput2">Nama Lengkap</label>
                                  <input type="text" id="nama_anggota" class="form-control" placeholder="Nama Lengkap" name="nama_anggota" value="{{ $anggota->nama_anggota }}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput1">Telp</label>
                                  <input type="text" id="no_telepon" class="form-control" placeholder="Telp" name="no_telepon" value="{{ $anggota->no_telepon }}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput2">Email</label>
                                  <input type="text" id="email" class="form-control" placeholder="email" name="email" value="{{ $anggota->email }}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput1">Tanggal Lahir</label>
                                  <input type="date" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{ $anggota->tgl_lahir }}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput2">Tempat Lahir</label>
                                  <input type="text" id="tempat_lahir" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ $anggota->tempat_lahir }}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput1">Jabatan</label>
                                  <select id="jabatan" name="jabatan" class="form-control">
                                    <option value="{{$anggota->jabatan}}">{{$anggota->jabatan}}</option>
                                    @foreach($jabatan as $data)
                                    <option value="{{$data->nama_jabatan}}">{{$data->nama_jabatan}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput2">Bagian</label>
                                  <select id="bagian" name="bagian" class="form-control">
                                    <option value="{{$anggota->bagian}}">{{$anggota->bagian}}</option>
                                    @foreach($bagian as $data)
                                    <option value="{{$data->nama_bagian}}">{{$data->nama_bagian}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput3">Kelamin</label>
                                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                    <option value="{{$anggota->jenis_kelamin}}">{{$anggota->jenis_kelamin}}</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                  </select></div>
                                </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="projectinput4">Level</label>
                                  <select id="level" name="level" class="form-control">
                                    <option value="{{$anggota->level}}">{{$anggota->level}}</option>
                                    <option value="admin">Admin</option>
                                    <option value="ketua">Ketua</option>
                                    <option value="anggota">Anggota</option>
                                  </select></div>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="projectinput2">Foto Anggota</label>
                                      @if(empty($anggota->foto_anggota)) <img src=""/> @else <img src="{{asset('/foto_anggota/'.$anggota->foto_anggota)}}" width="40px"/> @endif
                                      <input type="file" id="foto_anggota" class="form-control" placeholder="Foto Anggota" name="foto_anggota">
                                    </div>
                                  </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="companyName">Alamat</label>
                                    <textarea id="alamat_anggota" rows="5" class="form-control" name="alamat_anggota" placeholder="Alamat">{{ $anggota->alamat_anggota }}</textarea>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div class="form-actions right">
                            <a href="{{ URL::previous() }}" class="btn btn-warning btn-min-width">Back</a>
                            <button type="submit" class="btn btn-primary btn-min-width">
                              Update
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
