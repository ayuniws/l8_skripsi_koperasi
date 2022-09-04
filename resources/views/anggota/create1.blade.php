@extends('layouts.template')

@section('sidemenu')
  @include('anggota.sidemenu')
@endsection

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Pengajuan Pinjaman</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Basic form layout section start -->
        <section id="basic-form-layouts">
          <div class="row match-height">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="basic-layout-form">Form Pengajuan Pinjaman</h4>
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
{{--                       <p>This is the most basic and default form having form sections.
                        To add form section use <code>.form-section</code> class
                        with any heading tags. This form has the buttons on the bottom
                        left corner which is the default position.</p>
                    </div> --}}
                    <form class="form">
                      <div class="form-body">
                          <label for="nama anggota">Nama Anggota</label>
                          <input type="text" id="companyName" class="form-control" placeholder="nama anggota"
                          name="company">
                        </div>
                        <label for="projectinput5">Bagian</label>
                              <select id="projectinput5" name="interested" class="form-control">
                                <option value="none" selected="" disabled="">none</option>
                                <option value="glasir">Glasir</option>
                                <option value="pembentukan">pembentukan</option>
                                <option value="dekorasi">dekorasi</option>
                                <option value="QC">QC</option>
                                <option value="Staff">staff</option>
                              </select>
                        <label for="projectinput5">Jabatan</label>
                              <select id="projectinput5" name="interested" class="form-control">
                                <option value="none" selected="" disabled="">none</option>
                                <option value="kepala produksi">Kepala Produksi</option>
                                <option value="kepala bagian">Kepala Bagian</option>
                                <option value="kepala regu">Kepala Regu</option>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                              </select>
                              <div class="form-body">
                          <label for="NRP">NRP Anggota</label>
                          <input type="text" id="companyName" class="form-control" placeholder="NRP"
                          name="company">
                        </div>
                        <div class="form-group">
                          <label for="companyName">Tanggal Peminjaman</label>
                          <input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip"
                          data-trigger="hover" data-placement="top" data-title="Date Opened">
                        </div>
                        <label for="jumlah">Jumlah Pinjaman</label>
                          <input type="text" id="companyName" class="form-control" placeholder="RP.10.000"
                          name="company">
                        </div>
                        <label for="jangka waktu">Jangka Waktu</label>
                          <input type="text" id="companyName" class="form-control" placeholder="2 Bulan"
                          name="company">
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <textarea id="projectinput8" rows="5" class="form-control" name="comment" placeholder="Alasan"></textarea>
                        </div>
                      </div>
                      <div class="form-actions right">
                        <button type="button" class="btn btn-warning btn-min-width">
                         save
                        </button>
                        <button type="submit" class="btn btn-primary btn-min-width">
                          cetak
                        </button>
                        <button type="submit" class="btn btn-primary btn-min-width">
                          Ajukan
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