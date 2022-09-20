@extends('layouts.template')
@section('sidemenu')
@section('sidemenu')
    @if (Auth::user()->level == 'admin')
        @include('admin.sidemenu')
    @elseif (Auth::user()->level == 'ketua')
        @include('ketua.sidemenu')
    @endif
@endsection
@endsection
@section('data-tables')
<link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('modernadmin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-body">
        <!-- HTML5 export buttons table -->
        <section id="html5">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Daftar Pengajuan Pinjaman</h4>
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
                  <div class="card-body card-dashboard">
                      <table class="table table-striped table-bordered dataex-html5-export-print">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Anggota</th>
                            <th>Jumlah</th>
                            <th>Angsuran</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($list_pengajuan as $data )
                            <tr>
                              <td>{{ $data->no }}</td>
                              <td>{{ $data->tanggal }}</td>
                              <td>{{ $data->anggota->nama_anggota }}</td>
                              <td>{{ number_format($data->jumlah, 2, '.', ',') }}</td>
                              <td>{{ $data->angsuran }}</td>
                              <td>{{ $data->keterangan }}</td>
                              <td class="text-center">
                                <a class="btn btn-success btn-sm" href="{{ route('pengajuan.approve',$data->id) }}">Setujui</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('pengajuan.reject',$data->id) }}">Tolak</a>
                              </td>
                             </tr>
                            @endforeach
                        </tbody>
                      </table>
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
