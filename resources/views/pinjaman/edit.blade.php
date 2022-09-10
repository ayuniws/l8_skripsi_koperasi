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
                  <h4 class="card-title" id="basic-layout-form">Form Edit Transaksi Pinjaman</h4>
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
                        <form method="POST" action="{{ route('pinjaman.update', $pinjaman->id) }}" class="form" novalidate>@csrf @method('PUT')
                                <div class="form-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="projectinput1">No</label>
                                        <input type="text" id="no" class="form-control" placeholder="No Transaksi" name="no" value="{{ pinjaman->no }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="projectinput1">Nama Jabatan</label>
                                          <input type="date" id="tanggal" class="form-control" placeholder="Tanggal Transaksi" name="tanggal" value="{{ pinjaman->tanggal }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="projectinput1">Anggota</label>
                                        <input type="text" id="nrp" class="form-control" placeholder="Anggota" name="nrp" value="{{ pinjaman->nrp }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="projectinput1">Jumlah</label>
                                          <input type="date" id="jumlah" class="form-control" placeholder="Jumlah" name="jumlah" value="{{ pinjaman->jumlah }}">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="projectinput1">Angsuran</label>
                                        <input type="text" id="angsuran" class="form-control" placeholder="Angsuran" name="angsuran" value="{{ pinjaman->angsuran }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="projectinput1">Jumlah</label>
                                          <input type="date" id="keterangan" class="form-control" placeholder="Keterangan" name="keterangan" value="{{ pinjaman->keterangan }}">
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
