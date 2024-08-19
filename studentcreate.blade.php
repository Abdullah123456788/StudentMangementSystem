@extends('frontend.layout')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ url('template/css/vertical-layout-light/style.css') }}" />
</head>
<body>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form</h4>
                <p class="card-description">Add Student</p>
                <form class="forms-sample" action="{{ route('student.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Class</label>
                        <select class="form-control" id="class_id" name="class_id" required>
                            @foreach($class as $class)
                                <option value="{{ $class->id }}">{{ $class->class }} - {{ $class->section }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="marks">Marks</label>
                        <input type="number" class="form-control" id="marks" name="marks" placeholder="Marks" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
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
