<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
</head>

<body>
    <div class="bg-black container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid ms-2 page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="page-body-wrapper">
                <div class="container">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if ($appointments->isEmpty())
                        <div class="text-center my-5">
                            <h1 class="font-bold">No appointments !</h1>
                        </div>
                    @else
                        <div class="table-responsive mt-4 mx-auto" style="width: 1000px; overflow-x: auto;">
                            <table class="table table-dark table-striped border text-white">
                                <thead>
                                    <tr>
                                        <th>Client Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Doctor</th>
                                        <th>Status</th>
                                        <th>Message</th>
                                        <th colspan="3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>{{ $row->date }}</td>
                                            <td>{{ $row->doctor }}</td>
                                            <td>
                                                    @switch($row->status)
                                                        @case('In progress')
                                                            <span class="badge badge-warning">Pending</span>
                                                            @break
                                                        @case('approved')
                                                            <span class="badge badge-success">Approved</span>
                                                            @break
                                                        @case('canceled')
                                                            <span class="badge badge-danger">Rejected</span>
                                                            @break
                                                    @endswitch
                                                </td>
                                            <td>{{ $row->message }}</td>
                                            <td>
                                                <a type="button" href='{{ route('notify', $row->id) }}'
                                                    onclick="return confirm('Are you sure')" class="btn btn-primary">
                                                    <i class="bi bi-bell-fill"></i> notify
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->

            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
