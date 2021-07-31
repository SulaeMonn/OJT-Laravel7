@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Update User Confirmation</h2>
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

                <div class="panel panel-default">
                    <div class="panel-heading">Name : {{ $name }}</div>
                    <div class="panel-body">
                        email : {{ $email }}
                    </div>
                    <div class="panel-body">
                        Type : {{ $type }}
                    </div>
                    <div class="panel-body">
                        Phone : {{ $phone }}
                    </div>
                    <div class="panel-body">
                        Date Of Birth : {{ $dob }}
                    </div>
                    <div class="panel-body">
                        Address : {{ $address }}
                    </div>
                </div>


                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="name" class="form-control" placeholder="name"
                                    value="{{ $name }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="email" class="form-control" placeholder="email"
                                    value="{{ $email }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="type" class="form-control" placeholder="type"
                                    value="{{ $type }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="phone" class="form-control" placeholder="phone"
                                    value="{{ $phone }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="dob" class="form-control" placeholder="dob"
                                    value="{{ $dob }}">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="hidden" name="address" class="form-control" placeholder="address"
                                    value="{{ $address }}">
                            </div>
                        </div>

                        <div class="mr-5">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                        <div class="mr-5">
                            <a href="{{ URL::previous() }}" class="btn btn-primary"> Cancel </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection