@extends('frontend.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-right" style="margin-top: 12px; margin-bottom: 2px">
                <a href="{{ route('subjects.create') }}">
                    <button class="btn btn-primary">Add</button>
                </a>
            </div>
            <table id="subjectTable" class="table table-striped table-dark">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Classes</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->id }}</td>
                        <td>{{ $subject->name }}</td>
                        <td>
                            @foreach($subject->classes as $class)
                                {{ $class->class }} - {{ $class->section }}<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('subjects.edit', $subject->id) }}">
                                <button class="btn btn-success">Edit</button>
                            </a>
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @if(session('success'))
                <div style="color:red; font-weight:bold;"> 
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
