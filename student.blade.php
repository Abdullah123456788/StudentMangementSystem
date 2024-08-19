@extends('frontend.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
           
            <div class="text-right" style="margin-top: 12px; margin-bottom: 2px">
                <a  href="{{route('student.create')}}">
                    <button class="btn btn-primary">Add</button>
                </a>
            </div>
            <table id="studentTable" class="table table-striped  table-dark" >
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    {{-- <th>Class</th>
                    <th>Section</th>
                    <th>Marks</th>
                    <th>Gender</th> --}}
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($student as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        {{-- <td>{{$student->class->class}}</td>
                        <td>{{$student->class->section}}</td>
                        <td>{{$student->marks}}</td> --}}
                        {{-- <td>{{$student->gender}}</td> --}}
                        <td>
                            <a href="{{url('/student/delete')}}/{{$student->id}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <a href="{{url('/student/edit')}}/{{$student->id}}">
                                <button class="btn btn-success">Edit</button>
                            </a>
                            <a href="{{ url('/student/view/'. $student->id) }}">
                                <button class="btn btn-info">View</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(session('success'))
    <div style="color: red; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif
        </div>
    </div>
</div>
@endsection
