@include('skins.inc.header')
@include('skins.inc.sidebar')
<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        {{-- <h4 class="font-weight-bold mb-0">Add Employer</h4> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('insert.employeeRenewal') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <h4 class="card-title">Select Employer</h4>
                    <div class="row">
                         <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Employer Name</label>
                                    <div class="col-sm-9">
                                         <select class="form-control" name="emp_name" id="emp_id">
                                            @foreach($employers as $employer)
                                            <option value={{ $employer->id }}>{{$employer->emp_name}}</option>
                                            @endforeach
                                            @if ($errors->has('emp_name'))
                                            <span class="text-danger">{{ $errors->first('emp_name') }}</span>
                                        @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Select Employee</label>
                                    <div class="col-sm-9">
                                         <select class="form-control" name="employee_name" id="employee_name">
                                            <option>Select Employee</option>
                                            @if ($errors->has('employee_name'))
                                            <span class="text-danger">{{ $errors->first('employee_name') }}</span>
                                        @endif
                                        </select>
                                    </div>

                                </div>
                            </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Employer Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="employer" id="employer" readonly />
                                        
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Employee Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  id="employee" name="employee" readonly />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sector</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  id="sector" name="sector" readonly />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <p class="card-description">
                            Passport Details
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Passport Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ps_num" id="ps_num" readonly/>
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Issue Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="ps_ise"
                                            name="ps_ise" readonly/>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" id="ps_ex"
                                            name="ps_ex" readonly />
                                    </div>

                                </div>
                            </div>
                        </div>
                         <p class="card-description">
                            Work Permit Details
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Pass Sticker Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="wrk_num" placeholder="dd/mm/yyyy" id="wrk_num" readonly>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Pass Year</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="wrk_pass_yr" id="wrk_pass_yr" readonly>
                                    </div>

                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Pass Issue</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="wrk_is" placeholder="dd/mm/yyyy" id="wrk_is" readonly>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Pass Expire</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="wrk_ex" id="wrk_ex" readonly>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <p class="card-description">Renewal Deatils</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Visa Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="visa_type" id="visa_type">
                                         @if ($errors->has('visa_type'))
                                            <span class="text-danger">{{ $errors->first('visa_type') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Document</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="document" id="document">
                                         @if ($errors->has('document'))
                                            <span class="text-danger">{{ $errors->first('document') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Renewal Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="renewal_date" id="renewal_date">
                                         @if ($errors->has('renewal_date'))
                                            <span class="text-danger">{{ $errors->first('renewal_date') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="expiry_date" id="expiry_date">
                                         @if ($errors->has('expiry_date'))
                                            <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="remarks" id="remarks" rows="5"> </textarea>
                                         @if ($errors->has('remarks'))
                                            <span class="text-danger">{{ $errors->first('remarks') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select  class="form-control" name="status" id="status">
                                            <option value="Yet To Start">Yet To Start</option>
                                            <option value="Progress">In Progress</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                         @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary text-center">Submit</button>
                    </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->


    @include('skins.inc.footer')
    <script>
        $(document).ready(function() {
           $(document).on('click' ,function(){
             var empId = $('#emp_id').val();
             $.ajax({
                url:'get-employee/' + empId,
                method:"GET",
                // data:{empId:empId},
                success:function(response){
                   var employees = response.employees
                   $('#employer').val(response.employer.emp_name);
                   $('#employee_name').empty();
                   $.each(employees, function(index,employee){
                    $('#employee_name').append('<option value="' + employee.id + '">' + employee.emp_fname + '</option>');
                   })
                //    $('#employee')
                },
                error:function(error){
                    console.log(error)
                }
             });
           });

           $(document).on('click' ,function(){
            var employeId = $('#employee_name').val();
            console.log(employeId)
            $.ajax({
                url:'get-employeDetails/'+employeId,
                method:'GET',
                success:function(response){
                    console.log(response)
                    $('#employee').val(response.employee.emp_fname);
                    $('#sector').val(response.sector.sector_name);
                    $('#ps_num').val(response.employee.passport_number);
                    $('#ps_ise').val(response.employee.passport_is_date);
                    $('#ps_ex').val(response.employee.passport_ex_date);
                    $('#wrk_num').val(response.employee.sticker_number);
                    $('#wrk_pass_yr').val(response.employee.workpass_yr);
                    $('#wrk_is').val(response.employee.workpass_is_date);
                    $('#wrk_ex').val(response.employee.workpass_ex_date);
                },
                error:function(error){
                    console.log(error)

                }
            });
           });
        });
    </script>
