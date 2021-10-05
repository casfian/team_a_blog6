@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create new Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('roles.index') }}">Back</a>
            </div>
        </div> 
    </div>

    {{-- kalau error --}}
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <Strong>OPS! You have an Error!</Strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- buat form sini --}}
    <div class="row">
        {!! Form::open( array('method' => 'POST', 'route' => 'roles.store')) !!}
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Name: </strong>
                    {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}
                </div>
            </div>
    
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="form-group">
                    <strong>Permission: </strong>
                    <br>
                    @foreach ($permissons as $permission)
                        <label>{{ Form::checkbox('permission[]', $permission->id), false, array('class' => 'name') }} {{ $permission->name }} </label>
                    @endforeach
                    <br/>
                </div>
            </div>
    
            <div class="col-xs-12 col-md-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    
        {!! Form::close() !!}    
        </div>


</div>

@endsection