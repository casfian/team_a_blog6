@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="">Back</a>
            </div>
        </div> 
    </div>

    <div class="row">
    {!! Form::open( array('method' => 'POST', 'route' => 'users.store')) !!}
        <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Name: </strong>
                {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Email: </strong>
                {!! Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Password: </strong>
                {!! Form::password('password', null, array('placeholder' => 'Password', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Comfirm Password: </strong>
                {!! Form::password('confirm-password', null, array('placeholder' => 'Confirm Password', 'class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-md-12 col-sm-12">
            <div class="form-group">
                <strong>Role: </strong>
                {!! Form::select('roles[]', $roles, [], array('class' => 'form-control', 'multiple')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-md-12 col-sm-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    {!! Form::close() !!}    
    </div>

</div>
@endsection