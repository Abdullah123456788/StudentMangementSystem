@extends('frontend.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ url('template/css/vertical-layout-light/style.css') }}" />
    <!-- endinject -->
</head>

<body>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form</h4>
                <p class="card-description">
                    Add Class
                </p>
                <form class="forms-sample" action="{{ route('class.store') }}" method="POST">
                    @csrf <!-- Add CSRF token -->
                    <div class="form-group">
                        <label for="class">Class</label>
                        <input type="number" class="form-control" id="class" name="class" placeholder="Class" required>
                    </div>
                    <div class="form-group">
                        <label for="section">Section</label>
                        <input type="text" class="form-control" id="section" name="section" placeholder="Section" required>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button type="button" class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
@endsection