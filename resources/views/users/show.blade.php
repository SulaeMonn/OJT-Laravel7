@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pull-left">
                    <h2>User Profile</h2>
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

        <form action="" >
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Name:{{$user->name}}</strong><br>
                        <img src="{{ asset('storage/uploads/' . $user->profile) }}" height="150px" width="150px">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Email Address:{{$user->email}}</strong>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Type:{{$user->type}}</strong>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Phone:{{$user->phone}}</strong>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Date Of Birth:{{$user->dob}}</strong>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Address:{{$user->address}}</strong>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection
