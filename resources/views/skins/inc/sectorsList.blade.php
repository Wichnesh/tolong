@include('skins.inc.header')
@include('skins.inc.sidebar')

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0">Workers List</h4>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sectors List</h4>
                        <div class="table-responsive">
                            <table class="table table-striped" id="myTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Sector's
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($sectors as $sector)
                                    <tr>
                                       <td>{{ $loop->iteration }}</td>
                                        <td >
                                            {{ $sector->sector_name }}
                                        </td>
                                        <td >
                                            <a href="{{ route('sector.edit',['id'=>$sector->id]) }}">Edit</a>
                                            <a href="{{ route('sector.delete',['id'=>$sector->id]) }}">Delete</a>
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
