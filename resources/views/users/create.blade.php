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

{{-- If Using Normal HTML Form --}}
{{-- 
<form action="{{ route('users.store') }}" method="POST">
    <div class="container">
      <h1>Create a New User</h1>
      <p>Please fill in this form to create a new User.</p>
      <hr>
  
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email">
  
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Password" name="password" id="password">
  
      <label for="confirm-password"><b>Confirm Password</b></label>
      <input type="password" placeholder="Confirm password" name="confirm-password" id="confirm-password">

      <label for="confirm-password"><b>Roles</b></label>
      <select class="form-control" name="roles[]" id="roles" multiple="multiple">
        @foreach($roles as $role)
          <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
      </select>
  
      <button type="submit" class="btn btn-primary">Create New User</button>
    </div>

  </form> 
  --}}