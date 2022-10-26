<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parker Management Portal</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="p-3 bg-info text-white text-center">
    <h1>Sales Team</h1>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 pb-2 pe-2">
            <a class="btn btn-primary float-end" href="{{ route('create') }}">Add New</a>
        </div>
        <div class="container mt-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="container">
            @if(count($managers) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="text-center table-info">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Current Route</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($managers as $manager)
                            <tr>
                                <td>{{ $manager->id }}</td>
                                <td>{{ $manager->name }}</td>
                                <td>{{ $manager->email }}</td>
                                <td>{{ $manager->telephoneNo }}</td>
                                <td>{{ $manager->currentRoute }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#memberModal_{{$manager->id}}">View
                                    </button>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('edit', $manager->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form method="post" action="{{ route('delete', $manager->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-sm delete_btn">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="memberModal_{{$manager->id}}" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{ $manager->name }}</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row pb-3">
                                                <div class="col-md-3 fw-bold">ID :</div>
                                                <div class="col-md-9">{{ $manager->id }}</div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-3 fw-bold">Full Name :</div>
                                                <div class="col-md-9">{{ $manager->name }}</div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-3 fw-bold">Email Address :</div>
                                                <div class="col-md-9">{{ $manager->email }}</div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-3 fw-bold">Telephone :</div>
                                                <div class="col-md-9">{{ $manager->telephoneNo }}</div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-3 fw-bold">Joined Date :</div>
                                                <div
                                                    class="col-md-9">{{ \Carbon\Carbon::parse($manager->joinedDate)->format('j F Y') }}</div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-md-3 fw-bold">Current Route :</div>
                                                <div class="col-md-9">{{ $manager->currentRoute }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 fw-bold">Comments :</div>
                                                <div class="col-md-9">{{ $manager->comment }}</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).on('click', '.delete_btn', function (e) {
        swal.fire({
            title: "Are you sure?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
        }).then(result => {
            if (result.value) {
                $(this).closest("form").submit();
            }
        });
    });
</script>
</html>
