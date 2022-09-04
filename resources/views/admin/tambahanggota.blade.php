@extends('layouts.template')
@section('sidemenu')
  @include('admin.sidemenu')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Form Tambah Anggota</h3>
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Manage Anggota</a>
                </li>
                <li class="breadcrumb-item active"><a href="tambahanggota">Tambah Anggota</a>
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
                  <h4 class="card-title" id="basic-layout-form">Tambah Anggota</h4>
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
                        <h4 class="form-section"><i class="ft-user"></i>Data Anggota Baru</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">NRP</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="NRP"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Nama Lengkap</label>
                              <input type="text" id="projectinput2" class="form-control" placeholder="Name"
                              name="lname">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">E-mail</label>
                              <input type="text" id="projectinput3" class="form-control" placeholder="E-mail" name="email">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">Level</label>
                              <select id="level" name="level" class="form-control">
                                <option value="admin">Admin</option>
                                <option value="ketua">Ketua Koperasi</option>
                                <option value="anggota">Anggota</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="companyName">Password</label>
                          <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="projectinput4">Status</label>
                            <select id="status" name="status" class="form-control">
                              <option value="enabled">Enabled</option>
                              <option value="disabled">Disabled</option>
                            </select>                            
                          </div>
                        </div>
                      </div>
                      <div class="form-actions right">
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
  @endsection
