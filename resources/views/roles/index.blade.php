@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Roles Management</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.create') }}">Create New Role</a>
            </div>
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    <th width=280px>Action</th>
                </tr>
                {{-- loop Data dan display dalam bentuk pagination --}}
                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td> Show | Edit | Delete </td>
                    </tr>  
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection