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
                <form class="forms-sample" action="{{ route('subjects.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Subject Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Classes</span>
                        <select name="class[]" multiple class="form-control" required>
                            @foreach($class as $class)
                                <option value="{{ $class->id }}">{{ $class->class }} - {{ $class->section }}</option>
                            @endforeach
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
