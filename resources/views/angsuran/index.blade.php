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
                  <h4 class="card-title">Daftar Angsuran</h4>
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
                    <div class="float-left">
                      <a class="btn btn-success" href="{{ route('angsuran.create') }}">Add TR Angsuran</a>
                  </div>
                      <table class="table table-striped table-bordered dataex-html5-export-print">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Anggota</th>
                            <th>Jumlah</th>
                            <th>Angsuran Ke</th>
                            <th>Keterangan</th>
                            <th>Admin</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($angsuran as $data )
                            <tr>
                              <td>{{ $data->no }}</td>
                              <td>{{ $data->tanggal }}</td>
                              <td>{{ $data->nrp->anggota->nama_anggota }}</td>
                              <td>{{ $data->jumlah }}</td>
                              <td>{{ $data->angsuran_ke }}</td>
                              <td>{{ $data->keterangan }}</td>
                              <td>{{ $data->admin }}</td>
                              <td class="text-center">
                                <form action="{{ route('angsuran.destroy',$data->id) }}" method="POST">
                                    <a class="btn btn-primary btn-sm" href="{{ route('angsuran.edit',$data->id) }}"><i class="la la-edit"></i></a>
                                    @csrf
                                    {{-- @method('DELETE') --}}
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="la la-trash"></i></button>
                                </form>
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
