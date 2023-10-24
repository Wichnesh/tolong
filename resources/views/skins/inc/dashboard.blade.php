@include('skins.inc.header')
@include('skins.inc.sidebar')
<!-- partial -->


<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Dashboard</h4>
                    </div>
                    {{-- <div>
                    <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                      <i class="ti-clipboard btn-icon-prepend"></i>Report
                    </button>
                </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Sectors</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $data['sectors_count'] ?? 0 }}
                            </h3>
                            <i class="ti-calendar icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small></small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Employers</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $data['employers_count'] ?? 0 }}
                            </h3>
                            <i class="ti-briefcase icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small></small></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-md-center text-xl-left">Employees</p>
                        <div
                            class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                            <h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0">{{ $data['employes_count'] ?? 0 }}
                            </h3>
                            <i class="ti-user icon-md text-muted mb-0 mb-md-3 mb-xl-0"></i>
                        </div>
                        <p class="mb-0 mt-2 text-danger"><span class="text-black ml-1"><small></small></span></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- {{ dd($employer_expire_counts) }} --}}
                        <p class="card-title">Passport Expires</p>
                        <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Days</th>
                                    <th>0-30</th>
                                    <th>30-60</th>
                                    <th>60-90</th>
                                    <th>90-120</th>
                                    <th>120-150</th>
                                    <th>150-180</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($employer_expire_counts))
                                    <tr>
                                        <td>Employer</td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employer', '0-30') }}">{{ $employer_expire_counts['0-30'] }}</a>
                                        </td>

                                        <td>
                                            <a href="{{ route('expiry.employer', '30-60') }}">
                                                {{ $employer_expire_counts['30-60'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employer', '60-90') }}">{{ $employer_expire_counts['60-90'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employer', '90-120') }}">{{ $employer_expire_counts['90-120'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employer', '120-150') }}">{{ $employer_expire_counts['120-150'] }}</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('expiry.employer', '150-180') }}">
                                                {{ $employer_expire_counts['150-180'] }} </a>
                                        </td>
                                    </tr>
                                @endif
                                @if (!empty($employee_expire_counts))
                                    <tr>
                                        <td>Employee</td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employee', '0-30') }}">{{ $employee_expire_counts['0-30'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employee', '30-60') }}">{{ $employee_expire_counts['30-60'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employee', '60-90') }}">{{ $employee_expire_counts['60-90'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employee', '90-120') }}">{{ $employee_expire_counts['90-120'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employee', '120-150') }}">{{ $employee_expire_counts['120-150'] }}</a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ route('expiry.employee', '150-180') }}">{{ $employee_expire_counts['150-180'] }}</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('skins.inc.footer')
