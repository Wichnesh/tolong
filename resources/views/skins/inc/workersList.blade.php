@include('skins.inc.header')
@include('skins.inc.sidebar')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Employees List</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Workers List</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                      <th>#</th>
                                        <th>
                                            Employee Name
                                        </th>
                                        <th>
                                            Employer Name
                                        </th>
                                        <th>
                                            Sector
                                        </th>
                                        <th>
                                           Employer Phone Number
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
                                           Work Pass Sticker Number
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($employees as $employee)
                                    <tr>
                                      <td>{{ $loop->iteration }}</td>
                                        <td >
                                            {{ $employee->emp_fname }}
                                        </td>
                                        <td>
                                            {{ $employee->employer->emp_name }}
                                        </td>
                                        <td>
                                            {{ $employee->sector_name }}
                                        </td>
                                        <td>
                                            {{ $employee->employer->emp_phone }}
                                        </td>
                                        <td>
                                            {{ $employee->passport_number }}
                                        </td>
                                        <td>
                                           {{ $employee->passport_is_date }}
                                        </td>
                                        <td>
                                           {{ $employee->passport_ex_date }}
                                        </td>
                                         <td>
                                           {{ $employee->sticker_number }}                                            
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.employee',['id'=>$employee->id]) }}">Edit</a>
                                            <a href="{{ route('delete.employee',['id'=>$employee->id]) }}">Delete</a>
                                        </td>
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
