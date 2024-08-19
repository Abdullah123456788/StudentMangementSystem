@extends('frontend.layout')
@section('content')

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title text-primary">{{ $student->name }}'s Details</h4>
            <ul>
                <li  class="text-uppercase"><strong>Name:</strong> {{ $student->name }}</li>
                <li class="text-uppercase"><strong>Class:</strong> {{ $student->class->class }}</li>
                <li class="text-uppercase"><strong>Section:</strong> {{ $student->class->section }}</li>
                <li class="text-uppercase"><strong>Marks:</strong> {{ $student->marks }}</li>
                <li class="text-uppercase"><strong>Gender:</strong> {{ $student->gender }}</li>
            </ul>
    
      </div>
    </div>
  </div>

@endsection