@include('skins.inc.header')
@include('skins.inc.sidebar')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Expires List</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Employee List</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Employer Name
                                        </th>
                                        <th>
                                            Passport Number
                                        </th>
                                        <th>
                                            Passport Issue Date
                                        </th>
                                        <th>
                                            Passport Expire Date
                                        </th>
                                        <th>
                                            Work Pass Year
                                        </th>
                                        <th>
                                            Sticker Number
                                        </th>
                                        <th>
                                            Work Pass Issue
                                        </th>
                                        <th>
                                            Work Pass Expire
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $employee->emp_fname }}</td>
                                            <td>{{ $employee->passport_number }}</td>
                                            <td>{{ $employee->passport_is_date }}</td>
                                            <td>{{ $employee->passport_ex_date }}</td>
                                            <td>{{ $employee->workpass_yr }}</td>
                                            <td>{{ $employee->sticker_number }}</td>
                                            <td>{{ $employee->workpass_is_date }}</td>
                                            <td>{{ $employee->workpass_ex_date }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        @include('skins.inc.footer')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
