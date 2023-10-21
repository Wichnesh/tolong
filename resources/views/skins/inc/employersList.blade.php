@include('skins.inc.header')
@include('skins.inc.sidebar')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Employers List</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Employer List</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Employer Name
                                        </th>
                                        <th>
                                            Employer Phone Number
                                        </th>
                                        <th>
                                            Passport Issue Date
                                        </th>
                                        <th>
                                            Passport Expire Date
                                        </th>
                                        <th>
                                            Employer License Number
                                        </th>
                                        <th>
                                            Quota Pending
                                        </th>
                                        <th>
                                            Perkeso Employer's Code
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employers as $employer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $employer->emp_name }}
                                            </td>
                                            <td>
                                                {{ $employer->emp_phone }}
                                            </td>
                                            <td>
                                                {{ $employer->passport_issue }}
                                            </td>
                                            <td>
                                                {{ $employer->passport_expire }}
                                            </td>
                                            <td>
                                                {{ $employer->emp_lic }}
                                            </td>
                                            <td>
                                                {{ $employer->qute_count }}
                                            </td>
                                            <td>
                                                {{ $employer->emp_per_code }}
                                            </td>
                                            <td>
                                               <a href="{{route('edit.employer',['id'=>$employer->id])}}">Edit</a>
                                                <a href="{{route('delete.employer',['id'=>$employer->id])}}">Delete</a>
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
