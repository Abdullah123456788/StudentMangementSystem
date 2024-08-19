@extends('frontend.layout')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <title>Class</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>
<body>  
<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-right" style="margin-top: 12px; margin-bottom: 2px">
                <a href="{{ route('classforms') }}">
                    <button class="btn btn-primary">Add</button>
                </a>
            </div>
            <table id="classTable" class="table table-striped  table-dark" >
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($class as $class)
                    <tr>
                        <td>{{$class->id}}</td>
                        <td>{{$class->class}}</td>
                        <td>{{$class->section}}</td>
                        <td>
                            <a href="{{url('/class/delete')}}/{{$class->id}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <a href="{{url('/dashboard/edit')}}/{{$class->id}}">
                                <button class="btn btn-success">Edit</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(session('success'))
           <div style="color:red; font-weight:bold;"> 
            
           {{session('success')}}
           
        </div>
           @endif
        </div>
    </div>
</div>

</body>
</html>
@endsection

