@extends('layouts.app')
   
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="pull-left">
                <h2>Update User</h2>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('users.editconfirm',$user->id) }}" method="POST">
        @csrf
   
         <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Email Address:</strong>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="email">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Type:</strong>
                    <input type="text" name="type" value="{{ $user->type }}" class="form-control" placeholder="type">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="phone">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Date Of Birth:</strong>
                    <input type="text" name="dob" value="{{ $user->dob }}" class="form-control" placeholder="dob">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Address:</strong>
                    <textarea class="form-control" style="height:150px" name="address" placeholder="address">{{ $user->address }}</textarea>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Profile:</strong>
                    <input type="text" name="profile" value="{{ $user->profile }}" class="form-control" placeholder="profile">
                    <img src="{{ asset('storage/uploads/' . $user->profile) }}" height="150px" width="150px">
                </div>
            </div>
            <div class="col-md-8 text-center">
              <button type="submit" class="btn btn-primary">Confirm</button>
              <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </form>
    </div>
@endsection
