@include('skins.inc.header')
@include('skins.inc.sidebar')
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0" style="margin-left:17px;">Add Employer</h4>
                    </div>
                </div>
            </div>
        </div>


        {{-- <div class="row">
             <div class="col-md-6 grid-margin ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Category</h4>
                  <div class="form-group">
                    <label>Upload Category</label>
                    <input type="text" class="form-control" placeholder="Add Category" aria-label="Username">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Upload Sub Caterory</h4>
                  <div class="form-group">
                    <label for="exampleFormControlSelect2">Select Category</label>
                    <select class="form-control" id="exampleFormControlSelect2">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label>Add Sub Category</label>
                    <input type="text" class="form-control" placeholder="Add Sub Category" aria-label="Username">
                  </div>
                  <div class="form-group">
                    <label>Add Location</label>
                    <input type="text" class="form-control" placeholder="Add Location" aria-label="Username">
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
              </div>
            </div>
          </div> --}}
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="form-sample" action="{{ route('insert.employer') }}" method="POST">
                        @csrf
                       
                        <h4 class="card-title">Personal Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="name" />
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" rows="5" name="address"></textarea>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" />
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                {{-- <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy"/>
                          </div>
                        </div> --}}
                            </div>
                        </div>
                        <p class="card-description">
                            Passport Details
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Issue Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy"
                                            name="ps_ise" />
                                        @if ($errors->has('ps_ise'))
                                            <span class="text-danger">{{ $errors->first('ps_ise') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy"
                                            name="ps_ex" />
                                        @if ($errors->has('ps_ex'))
                                            <span class="text-danger">{{ $errors->first('ps_ex') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Labour's License</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lic">
                                        @if ($errors->has('lic'))
                                            <span class="text-danger">{{ $errors->first('lic') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Perkeso Employer's Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="per">
                                        @if ($errors->has('per'))
                                            <span class="text-danger">{{ $errors->first('per') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sector</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="multiple-checkboxes" multiple="multiple"
                                            name="sectors[]">
                                            @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}">{{ $sector->sector_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('sectors'))
                                            <span class="text-danger">{{ $errors->first('sectors') }}</span>
                                        @endif
                                    </div>
                                     
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Quota</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="quota">
                                        @if ($errors->has('quota'))
                                            <span class="text-danger">{{ $errors->first('quota') }}</span>
                                        @endif
                                    </div>
                        </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 1</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div> --}}
                        {{-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address 2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Postcode</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                    </div> --}}
                        {{-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Country</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option>india</option>
                              <option>Italy</option>
                              <option>Russia</option>
                              <option>Britain</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      
                    </div> --}}
                        {{-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Passport Number</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Expire Date</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy"/>
                          </div>
                        </div>
                      </div>
                      
                    </div> --}}
                        <button type="submit" class="btn btn-primary text-center">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    @include('skins.inc.footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <script>
        $(document).ready(function() {
            $('#multiple-checkboxes').multiselect({
                includeSelectAllOption: true,
            });
        });
    </script>
