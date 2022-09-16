@extends('layouts.template')
@section('sidemenu')
    @if (Auth::user()->level == 'admin')
        @include('admin.sidemenu')
    @elseif (Auth::user()->level == 'ketua')
        @include('ketua.sidemenu')
    @elseif (Auth::user()->level == 'anggota')
        @include('anggota.sidemenu')
    @endif
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Form Transaksi Pengajuan Pinjaman</h4>
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
                    <form method="POST" action="{{ route('pinjaman.store') }}" class="form" novalidate>@csrf
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">No</label>
                              <input type="hidden" id="nrp"  name="nrp" value="{{ Auth::user()->nrp }}" readonly>
                              <input type="text" id="no" class="form-control" placeholder="No Transaksi" name="no" value="{{ $no }}" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Tanggal</label>
                                <input type="date" id="tanggal" class="form-control" placeholder="Tanggal Transaksi" name="tanggal">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Jumlah Angsuran (Bulan)</label>
                              <input type="text" id="angsuran" class="form-control" placeholder="Angsuran" name="angsuran">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Jumlah</label>
                                <input type="text" id="jumlah" class="form-control" placeholder="Jumlah" name="jumlah">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">Keterangan</label>
                            <input type="text" id="keterangan" class="form-control" placeholder="Keterangan" name="keterangan">
                        </div>
                        <div class="form-actions right">
                        <a href="{{ URL::previous() }}" class="btn btn-warning btn-min-width">Back</a>
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