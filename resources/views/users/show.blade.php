@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-start">
                            <div class="col-6">
                                <p class="h4">User Profile</p>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary float-right">Edit</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Name</div>
                            <div class="col-6">{{ $user->name }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6"></div>
                            <div class="col-6"><img src="{{ asset('storage/uploads/'.$user->profile) }}" height="200px"
                                    width="180px"></div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Email Address</div>
                            <div class="col-6">{{ $user->email }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Type</div>
                            <div class="col-6">{{ $user->type }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Phone</div>
                            <div class="col-6">{{ $user->phone }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Date Of Birth</div>
                            <div class="col-6">{{ $user->dob }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Address</div>
                            <div class="col-6">{{ $user->address }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
