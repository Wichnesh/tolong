@include('skins.inc.header')
@include('skins.inc.sidebar')
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0" style="margin-left:17px;">Edit Employer</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form class="form-sample" action="{{ route('update.employer') }}" method="POST">
                        @csrf
                       
                        <h4 class="card-title">Edit Personal Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="employer_id" value="{{ $edit_emp->id }}"/>
                                        <input type="text" class="form-control" name="name" value="{{ isset($edit_emp) ? $edit_emp->emp_name  : ''}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" rows="5"  name="address" >{{ isset($edit_emp->emp_address) ? $edit_emp->emp_address : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone" value="{{ isset($edit_emp->emp_phone) ? $edit_emp->emp_phone : ''}}" />
                                        
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
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($edit_emp->passport_issue) ? $edit_emp->passport_issue : ''  }}"
                                            name="ps_ise" />
                                       
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($edit_emp->passport_expire) ? $edit_emp->passport_expire : ''  }}"
                                            name="ps_ex" />
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Labour's License</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lic" value="{{ isset($edit_emp->emp_lic) ? $edit_emp->emp_lic : ''}}">
                                       
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Perkeso Employer's Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="per" value="{{ isset($edit_emp->emp_per_code) ? $edit_emp->emp_per_code : ''}}">
                                        
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
                                            name="sectors[]" required>
                                            @foreach ($sectors as $sector)
                                                <option value="{{ $sector->id }}">{{ $sector->sector_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                       
                                    </div>
                                     
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Quota</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="quota"  value="{{ isset($edit_emp->qute_count) ? $edit_emp->qute_count : ''}}">
                                       
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
