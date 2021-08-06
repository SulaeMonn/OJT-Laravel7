@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>User Confirm</h2>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Name:</div>
                            <div class="col-6">{{ $name }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Email Address:</div>
                            <div class="col-6">{{ $email }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Password:</div>
                            <div class="col-6"><input id="password-field" type="password" value="{{ $password }}"
                                    style="background:transparent;border:none">
                            </div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Type:</div>
                            <div class="col-6">{{ $type }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Phone:</div>
                            <div class="col-6">{{ $phone }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Date Of Birth:</div>
                            <div class="col-6">{{ $dob }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Address:</div>
                            <div class="col-6">{{ $address }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Profile:</div>
                            <div class="col-6"><img src="{{ asset('storage/uploads/' . $profile) }}" height="200px"
                                    width="180px"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="name" class="form-control" value="{{ $name }}">
                            <input type="hidden" name="email" class="form-control" value="{{ $email }}">
                            <input type="hidden" name="password" class="form-control" value="{{ $password }}">
                            <input type="hidden" name="password_confirmation" class="form-control"
                                value="{{ $password_confirmation }}">
                            <input type="hidden" name="type" class="form-control" value="{{ $type }}">
                            <input type="hidden" name="phone" class="form-control" value="{{ $phone }}">
                            <input type="hidden" name="dob" class="form-control" value="{{ $dob }}">
                            <input type="hidden" name="address" class="form-control" value="{{ $address }}">
                            <input type="hidden" name="profile" class="form-control" value="{{ $profile }}">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ URL::previous() }}" class="btn btn-primary"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
