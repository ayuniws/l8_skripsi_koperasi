@extends('layouts.template')
@section('sidemenu')
    @if (Auth::user()->level == 'admin')
        @include('admin.sidemenu')
    @elseif (Auth::user()->level == 'ketua')
        @include('ketua.sidemenu')
    @endif
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
                  <h4 class="card-title">Daftar Anggota</h4>
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
                      <a class="btn btn-success" href="{{ route('anggota.create') }}">Add Anggota</a>
                  </div>
                    <div class="table-responsive">
                      <table class="table display nowrap table-striped table-bordered dataex-html5-export-print">
                        <thead>
                          <tr>
                            <th>NRP</th>
                            <th>Nama Anggota</th>
                            <th>Kelamin</th>
                            <th>Jabatan</th>
                            <th>Bagian</th>
                            <th>Rekening</th>
                            <th>Foto</th>
                            <th>Alamat</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($vanggota as $data )
                            <tr>
                              <td>{{ $data->nrp }}</td>
                              <td>{{ ucwords($data->nama_anggota) }}</td>
                              <td>{{ ucwords($data->jenis_kelamin) }}</td>
                              <td>{{ ucwords($data->jabatan) }}</td>
                              <td>{{ ucwords($data->bagian) }}</td>
                              <td>{{ ucwords($data->no_rekening) }}</td>
                              <td>@if(empty($data->foto_anggota)) <img src=""/> @else <img src="{{asset('/foto_anggota/'.$data->foto_anggota)}}" width="40px"/> @endif
                              </td>
                              <td>{{ ucwords($data->alamat_anggota) }}</td>
                              <td class="text-center">
                                <form action="{{ route('anggota.destroy',$data->id) }}" method="POST">
                                  <a class="btn btn-info btn-sm" href="{{ route('anggota.show',$data->id) }}"><i class="la la-search"></i></a>
                                  {{-- @if (Auth::user()->level == 'admin') --}}
                                  <a class="btn btn-primary btn-sm" href="{{ route('anggota.edit',$data->id) }}"><i class="la la-edit"></i></a>
                                   @csrf
                                   @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="la la-trash"></i></button>
                                  {{-- @endif --}}
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
          </div>
        </section>
        <!--/ HTML5 export buttons table -->
      </div>
    </div>
  </div>
  @endsection
