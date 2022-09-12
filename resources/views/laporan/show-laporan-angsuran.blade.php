@extends('layouts.template')
@section('sidemenu')
  @include('admin.sidemenu')
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
                  <h4 class="card-title" id="basic-layout-form">Laporan Angsuran Anggota</h4>
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
                      <div class="form-body">
                        <input type="hidden" id="jenis_laporan"  name="jenis_laporan" value="tunggu_buffing">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">Dari Tanggal</label>
                              <input type="date" id="dari_tanggal" class="form-control" placeholder="Dari Tanggal" name="dari_tanggal">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Sd Tanggal</label>
                              <input type="date" id="sd_tanggal" class="form-control" placeholder="Sampai Dengan Tanggal" name="sd_tanggal">
                            </div>
                          </div>
                        </div>
                      <div class="form-actions right">
                        <a href="{{ URL::previous() }}" class="btn btn-warning btn-min-width">Back</a>                        {{-- </button> --}}
                        <button type="submit" class="btn btn-primary btn-min-width">
                          Tampilkan
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
