@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Users Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}">Create New User</a>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width=280px>Action</th>
                </tr>
                {{-- loop Data dan display dalam bentuk pagination --}}
                @foreach ($data as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td> -- User Roles -- </td>
                        <td> Show | Edit | Delete </td>
                    </tr>  
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection