<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laporan Semua @if ($jenis_laporan=='angsuran')( Angsuran ) @elseif($jenis_laporan=='pinjaman') ( Pinjaman ) @elseif($jenis_laporan=='simpanan') ( Simpanan ) @endif</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style media="print">
      @page {
       size: auto;
       margin: 0;
    }
     </style>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <link rel="stylesheet" href="{{ asset('themes/stisla/assets/css/components.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         <!-- begin invoice-company -->
         <div class="invoice-company text-inverse f-w-600">
            <span id="printPageButton" class="pull-right hidden-print">
            {{-- <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a> --}}
            {{-- <a href="{{ route('cetak_laporan_pdf',$jenis_laporan) }}" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-pdf t-plus-1 fa-fw fa-lg"></i>Cetak PDF</a> --}}
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-arrow-left t-plus-1 fa-fw fa-lg"></i> Back</a>
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
            </span>
            {{-- <div class="m-t-5 m-b-5"> --}}
                <div class="">
                <img src="{{ asset('modernadmin/app-assets/images/logo/logo.png') }}" alt="branding logo" width="30"> | Koperasi Karyawan
                <p>Laporan Semua - @if ($jenis_laporan=='angsuran')( Angsuran ) @elseif($jenis_laporan=='pinjaman') ( Pinjaman ) @elseif($jenis_laporan=='simpanan') ( Simpanan ) @endif</p>
                <p>Periode {{ $dari_periode.' sd '.$sd_periode}}</p>
                </div>
            {{-- </div> --}}
         </div>

         <!-- end invoice-company -->
         <!-- begin invoice-header -->
         <div class="invoice-header">
            {{-- <div class="invoice-from">
               <div class="m-t-5 m-b-5">
                  Laporan Pengajuan SKCK - {{ $jenis_laporan .' Periode '.$dari_periode.' sd '.$sd_periode}}
               </div>
            </div> --}}
            <div class="invoice-to">
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th  class="text-center" width="1%">No</th>
                        <th class="text-center" width="5%">Tanggal</th>
                        <th class="text-center" width="5%">Anggota</th>
                        <th class="text-center" width="5%">Jumlah</th>
                        <th class="text-center" width="5%">Angsuran Ke</th>
                        <th class="text-center" width="5%">Keterangan</th>
                    {{-- <th class="text-center" width="5%">NIK</th>
                        <th class="text-center" width="10%">Nama Lengkap</th>
                        <th class="text-right" width="20%">Alamat</th>
                        <th class="text-right" width="10%">Email</th>
                        <th class="text-right" width="10%">Keperluan</th>
                        <th class="text-center" width="5%">Status</th>
                        <th class="text-center" width="10%">Foto</th> --}}
                     </tr>
                  </thead>
                  <tbody>
                @php
                     $no = 0;
                 @endphp
                 @foreach ($isi_laporan as $data)
                     <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->anggota->nama_anggota }}</td>
                        <td>{{ $data->jumlah }}</td>
                        <td>{{ $data->angsuran_ke }}</td>
                        <td>{{ $data->keterangan }}</td>
                  {{-- <td>{{ $data->nik }}</td>
                        <td>{{ $data->nama_lengkap }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->keperluan }}</td>
                        <td align="center">{{ $data->status }}</td>
                        <td align="center"><img src="{{asset('/upload/berkas-pengajuan/'.$data->foto)}}" width="100px"/></td> --}}
                     </tr>
                    @endforeach
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
         <!-- end invoice-footer -->
      </div>
    </div>
  </div>
</div>

<style type="text/css">
@media print{
    @page {
        size: landscape;
        max-width: 100%;
        margin: 1%;
    }
}
body{
    margin-top:20px;
    background:#eee;
    /* background-color: #f4f6f9; */
  /* font-size: 14px; */
    font-size: 12px;
    /* font-weight: 400; */
    font-family: "Nunito", "Segoe UI", arial;
    color: #6c757d;
}
p { margin:0 }
img {
    vertical-align: middle;
    border-style: none;
    padding:4px;
}
.table {
  color: inherit;
  border-collapse: collapse;
}
.table:text-center{
    text-align: center;
}
.table, .table-bordered tr {
    overflow: hidden;
    height: 14px;
    white-space: nowrap;
}
.table-bordered {
  border: 1px solid #dee2e6;
}
.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}
.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}
  .table:not(.table-sm):not(.table-md):not(.dataTable) th {
    padding: 0 5px;
    height: 30px;
    vertical-align: middle;
    }
    .table:not(.table-sm):not(.table-md):not(.dataTable) td {
    padding: 0 5px;
    height: 100px;
    vertical-align: middle; }
  }
  .table:not(.table-sm) thead th {
    border-bottom: none;
    background-color: rgba(0, 0, 0, 0.04);
    color: #666;
    padding-top: 15px;
    padding-bottom: 15px; }
  .table.table-md th,
  .table.table-md td {
    padding: 5px 10px; }
  /* .table.table-bordered td,
  .table.table-bordered th {
    border-color: #f6f6f6; } */
.table-striped tbody tr:nth-of-type(odd) {
  background-color: rgba(0, 0, 0, 0.02); }

  .btn {
  display: inline-block;
  font-weight: 400;
  color: #212529;
  text-align: center;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.375rem 0.75rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

@media (prefers-reduced-motion: reduce) {
  .btn {
    transition: none;
  }
}
@media (max-width: 575.98px) {
  .table-responsive table {
    min-width: 800px; } }

@media print {
  #printPageButton {
    display: none;
  }
}

.invoice {
    background: #fff;
    padding: 12px
}

.invoice-company {
    font-size: 14px;
    margin:0
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
.btn-sm, .btn-group-sm > .btn {
  padding: 0.25rem 0.5rem;
  font-size: 0.875rem;
  line-height: 1.5;
  border-radius: 0.2rem;
}
</style>
{{-- <script type="text/javascript">
</script> --}}
</body>
</html>
