@extends('layouts.template')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">Basic Forms</h3>
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
                  <h4 class="card-title" id="basic-layout-form">Project Info</h4>
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
                        <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">First Name</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="First Name"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">Last Name</label>
                              <input type="text" id="projectinput2" class="form-control" placeholder="Last Name"
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
                              <label for="projectinput4">Contact Number</label>
                              <input type="text" id="projectinput4" class="form-control" placeholder="Phone" name="phone">
                            </div>
                          </div>
                        </div>
                        <h4 class="form-section"><i class="la la-paperclip"></i> Requirements</h4>
                        <div class="form-group">
                          <label for="companyName">Company</label>
                          <input type="text" id="companyName" class="form-control" placeholder="Company Name"
                          name="company">
                        </div>
                        <div class="form-group">
                          <label for="companyName">Date</label>
                          <input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip"
                          data-trigger="hover" data-placement="top" data-title="Date Opened">
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput5">Interested in</label>
                              <select id="projectinput5" name="interested" class="form-control">
                                <option value="none" selected="" disabled="">Interested in</option>
                                <option value="design">design</option>
                                <option value="development">development</option>
                                <option value="illustration">illustration</option>
                                <option value="branding">branding</option>
                                <option value="video">video</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput6">Budget</label>
                              <select id="projectinput6" name="budget" class="form-control">
                                <option value="0" selected="" disabled="">Budget</option>
                                <option value="less than 5000$">less than 5000$</option>
                                <option value="5000$ - 10000$">5000$ - 10000$</option>
                                <option value="10000$ - 20000$">10000$ - 20000$</option>
                                <option value="more than 20000$">more than 20000$</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Select File</label>
                          <label id="projectinput7" class="file center-block">
                            <input type="file" id="file">
                            <span class="file-custom"></span>
                          </label>
                        </div>
                        <div class="form-group">
                          <label for="projectinput8">About Project</label>
                          <textarea id="projectinput8" rows="5" class="form-control" name="comment" placeholder="About Project"></textarea>
                        </div>
                      </div>
                      <div class="form-actions right">
                        <button type="button" class="btn btn-warning btn-min-width">
                         Cancel
                        </button>
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