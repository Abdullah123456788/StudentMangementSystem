@extends('frontend.layout')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <title>Users Detail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
</head>
<body>  
<div class="container">
    <div class="row">
        <div class="col">
            @if($error=Session::get("error"))
            {
                <div class="col-md-4" style="background-color: white; color:red; border:2px solid black;">
                {{($error)}}
                </div> 
            }
            @endif
            <div class="text-right" style="margin-top: 12px; margin-bottom: 2px">
                <a href="{{ route('register') }}">
                    <button class="btn btn-primary">Add</button>
                </a>
            </div>
            <table id="userTable" class="table table-striped  table-dark" >
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a href="{{url('/dashboard/delete')}}/{{$user->id}}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                            <a href="{{url('/dashboard/edit')}}/{{$user->id}}">
                                <button class="btn btn-success">Edit</button>
                            </a>

                            @if($user->verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                        <a href="{{ route('verify.user', ['id' => $user->id]) }}" class="btn btn-primary">Verify</a>
                        @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>

</body>
</html>
@endsection
