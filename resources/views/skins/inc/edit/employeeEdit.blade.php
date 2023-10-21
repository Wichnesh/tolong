@include('skins.inc.header')
@include('skins.inc.sidebar')
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0" style="margin-left:17px;">Edit Employee</h4>
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
                <div class="card-body"> <h4 class="card-title">1.Employer Details</h4>
                    <form class="form-sample" action="{{ route('update.employee') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Employer Name</label>
                                    <div class="col-sm-9">
                                         <select class="form-control" name="emp_name" id="emp_id" @if(isset($emp_edit->employer_id)) selected @endif>
                                            @foreach($employers as $employer)
                                            <option value={{ $employer->id }}>{{$employer->emp_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sector</label>
                                    <div class="col-sm-9">
                                         <select class="form-control" name="emp_sector" id="emp_sector" @if(isset($emp_edit->sector_id)) selected @endif required>
                                           
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <h4 class="card-title">2.Personal Details</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="hidden"name="employee_id" value="{{ $emp_edit->id }}" />
                                        <input type="text" class="form-control" name="f_name"  value="{{ isset($emp_edit->emp_fname) ? $emp_edit->emp_fname : '' }}" />
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Middle Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="m_name" value="{{ isset($emp_edit->emp_mname) ? $emp_edit->emp_mname : '' }}"/>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="l_name" value="{{ isset($emp_edit->emp_lname) ? $emp_edit->emp_lname : '' }}"/>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($emp_edit->emp_dob) ?  $emp_edit->emp_dob : ''}}"
                                            name="dob" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                           3.Passport Details
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Passport Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="" name="ps_num"  value="{{ isset($emp_edit->passport_number) ? $emp_edit->passport_number : '' }}"/>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Issue Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($emp_edit->passport_is_date) ? $emp_edit->passport_is_date : '' }}"
                                            name="ps_ise" />
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($emp_edit->passport_ex_date) ? $emp_edit->passport_ex_date : '' }}"
                                            name="ps_ex" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            4.Work Pass Details
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Pass Year</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="wrk_yr" value="{{ isset($emp_edit->workpass_yr) ?  $emp_edit->workpass_yr : '' }}">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sticker Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="st_num" value="{{ isset($emp_edit->sticker_number) ? $emp_edit->sticker_number : ''}}" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Issue Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($emp_edit->workpass_is_date) ? $emp_edit->workpass_is_date : '' }}"
                                            name="wrkpass_ise" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" value="{{ isset($emp_edit->workpass_ex_date) ? $emp_edit->workpass_ex_date : '' }}"
                                            name="wrkpass_exp" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" placeholder="" name="remarks" rows="5">{{ isset($emp_edit->remarks) ? $emp_edit->remarks : '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Sector</label>
                                    <div class="col-sm-9">
                                        <select class="form-control">
                                            <option>Category1</option>
                                            <option>Category2</option>
                                            <option>Category3</option>
                                            <option>Category4</option>
                                        </select>
                                        @if ($errors->has('remarks'))
                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
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
                        <button type="submit" class="btn btn-primary text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    @include('skins.inc.footer')
<script>
    $(document).ready(function(){
      $('#emp_id').on('click',function(){
        var empId = $(this).val();
        console.log(empId) 
        $.ajax({
            url:'/get-sectors/' + empId,
            method:'GET',
            success:function(data){
                // console.log(response)
                $('#emp_sector').empty();
                 $.each(data, function(index, sector) {
                        $('#emp_sector').append('<option value="' + sector.id + '">' + sector.sector_name + '</option>');
                    });
              
            },
            error:function(){
                console.log(error)
            }
        })
      });  
    });
</script>