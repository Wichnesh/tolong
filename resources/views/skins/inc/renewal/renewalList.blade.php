@include('skins.inc.header')
@include('skins.inc.sidebar')
<style>
    @media (max-width: 991px) {
        .tab-content>.tab-pane {
            display: block;
            opacity: 1;
        }
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Renewal List</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="column">
            <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane"
                        aria-selected="true">Employer</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane"
                        aria-selected="false">Employee</button>

                </li>
            </ul>
            <div class="tab-content accordion" id="myTabContent">
                <div class="tab-pane fade show active accordion-item" id="home-tab-pane" role="tabpanel"
                    aria-labelledby="home-tab" tabindex="0">

                    <h2 class="accordion-header d-lg-none" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Accordion
                            Item #1</button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block"
                        aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                        <div class="card">
                            <div class="card-body" style="display: flex">
                                {{-- <h4 class="card-title">Employer Renewal List</h4> --}}
                                <div class="table-responsive">
                                    <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>
                                                    Employer Name
                                                </th>
                                                <th>
                                                    Visa Type
                                                </th>
                                                <th>
                                                    Document
                                                </th>
                                                <th>
                                                    Renewal Date
                                                </th>
                                                <th>
                                                    Expiry Date
                                                </th>
                                                <th>
                                                    status
                                                </th>
                                                <th>
                                                    Remarks
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employer_renewals as $renewal)
                                            {{-- {{ dd($renewal) }} --}}
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $renewal->emp_name }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->visa_type }}
                                                    </td>
                                                    <td>
                                                        {{-- {{ $renewal->renewal_document }} --}}
                                                        <a href="{{ $renewal->renewal_document }}"
                                                            download="">Download</a>
                                                    </td>
                                                    <td>
                                                        {{ $renewal->renewal_date }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->renewal_expiry_date }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->visa_status }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->remarks }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('employer.renewal.edit',['id'=>$renewal->id]) }}">Edit</a>
                                                        <a href="{{ route('employer.renewal.delete',['id'=>$renewal->id]) }}">Delete</a>
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
                <div class="tab-pane fade accordion-item" id="profile-tab-pane" role="tabpanel"
                    aria-labelledby="profile-tab" tabindex="0">
                    <h2 class="accordion-header d-lg-none" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingTwo"
                        data-bs-parent="#myTabContent">
                        <div class="card">
                            <div class="card-body" style="display: flex">
                                {{-- <h4 class="card-title">Employee Renewal List</h4> --}}
                                <div class="table-responsive">
                                    <table class="table table-striped" id="myTable1" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>
                                                    Employee Name
                                                </th>
                                                <th>
                                                    Visa Type
                                                </th>
                                                <th>
                                                    Document
                                                </th>
                                                <th>
                                                    Renewal Date
                                                </th>
                                                <th>
                                                    Expiry Date
                                                </th>
                                                <th>
                                                    status
                                                </th>
                                                <th>
                                                    Remarks
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($employee_renewals as $renewal)
                                                {{-- {{ dd($renewal) }} --}}
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $renewal->emp_fname }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->visa_type }}
                                                    </td>
                                                    <td>
                                                        {{-- {{ $renewal->document }} --}}
                                                        <a href="{{ $renewal->document }}" download="">Download</a>
                                                    </td>
                                                    <td>
                                                        {{ $renewal->visa_renewal_date }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->visa_renewal_expire_date }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->renewal_status }}
                                                    </td>
                                                    <td>
                                                        {{ $renewal->remarks }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('employee.renewal.edit',['id'=>$renewal->id]) }}">Edit</a>
                                                        <a href="{{ route('employee.renewal.delete',['id'=>$renewal->id]) }}">Delete</a>
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
            </div>
        </div>


        <!-- content-wrapper ends -->
        @include('skins.inc.footer')
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
        <script>
            $(document).ready(function() {
                $('#myTable1').DataTable();
            });
        </script>
