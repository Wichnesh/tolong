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
                    <form action="{{ route('edit.renewal.employee') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">Renewal Deatils</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Visa Type</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" name="renewal_id" value="{{ $renewalEdit->id }}" />
                                        <input type="hidden" name="employee_id" value="{{ $renewalEdit->employee_id }}" />
                                        <input type="text" class="form-control" name="visa_type" id="visa_type" value="{{ isset($renewalEdit->visa_type) ? $renewalEdit->visa_type : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Document</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="document" id="document">
                                       <input type="text" class="form-control"
                                            value="{{ isset($renewalEdit->document) ? $renewalEdit->document : '' }}"
                                            readonly>
                                    </div>

                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Edit Renewal Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="renewal_date" id="renewal_date" 
                                        value="{{ isset($renewalEdit->visa_renewal_date) ? $renewalEdit->visa_renewal_date : '' }}"
                                        >
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Expiry date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" name="expiry_date" id="expiry_date"
                                        value="{{ isset($renewalEdit->visa_renewal_expire_date) ? $renewalEdit->visa_renewal_expire_date : '' }}"
                                        >
                                    </div>

                                </div>
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Remarks</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" name="remarks" id="remarks" rows="5">{{ isset($renewalEdit->remarks) ? $renewalEdit->remarks : '' }}</textarea>
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
 
