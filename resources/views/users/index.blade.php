@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User List</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{route('users.create')}}">Add</a>
            </div>
        </div>
    </div>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Name</td>
          <td>Email</td>
          <td>Phone</td>
          <td>BirthDate</td>
          <td>Address</td>
          <td>Profile</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->dob}}</td>
            <td>{{$user->address}}</td>
            <td><img src="{{ asset('storage/uploads/'.$user->profile) }}" height="50px" width="50px"></td>
            <td>
                <a href="{{ route('users.edit',$user->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
              <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                @csrf
                @method('DELETE')
      
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {{ $users->links() }}
<div>
</div>
</div>
@endsection