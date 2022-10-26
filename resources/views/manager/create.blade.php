<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Parker Management Portal | Create</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
<div class="p-3 bg-info text-white text-center">
    <h1>Add New Sales Representative</h1>
</div>
<div class="container mt-2">
    <div class="row">
        <div class="col-sm-12 pb-2 pe-2">
            <a class="btn btn-primary float-end" href="{{ route('list') }}">Back to List</a>
        </div>
        <div class="col-sm-12">
            <div class="container mt-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <form method="post" id="create_form" action="{{ route('store') }}" class="g-3 needs-validation" novalidate>
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="fw-bold">Full Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                    <div class="invalid-feedback">Name is required!</div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="email" class="fw-bold">Email Address:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                    <div class="invalid-feedback">Please provide a valid email!</div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="telephoneNo" class="fw-bold">Telephone:</label>
                    <input type="text" class="form-control" id="telephoneNo" placeholder="Enter telephone"
                           name="telephoneNo" required>
                    <div class="invalid-feedback">Telephone is required!</div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="telephoneNo" class="fw-bold">Joined Date:</label>
                    <div class="input-group joinedDate" id="datepicker">
                        <input type="text" class="form-control" id="joinedDate" name="joinedDate" required>
                        <span class="input-group-text bg-light d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        <div class="invalid-feedback">Joined date is required!</div>
                    </div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="currentRoute" class="fw-bold">Current Route:</label>
                    <input type="text" class="form-control" id="currentRoute" placeholder="Enter route"
                           name="currentRoute" required>
                    <div class="invalid-feedback">route is required!</div>
                </div>

                <div class="mb-3 mt-3">
                    <label for="comment" class="fw-bold">Comments:</label>
                    <textarea class="form-control" name="comment" id="comment" placeholder="Enter comments"
                              required></textarea>
                    <div class="invalid-feedback">Comment is required!</div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#joinedDate').datepicker();

        const forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false)
        })
    });
</script>
</html>
