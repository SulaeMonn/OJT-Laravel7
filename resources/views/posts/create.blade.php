@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pull-left">
                    <h2>Create post</h2>
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

        <form action="{{route('posts.confirm')}}" method="POST">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description"
                            placeholder="Detail"></textarea>
                    </div>
                </div>
                <div class="col-md-8 text-center">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                </div>
            </div>

        </form>
    </div>
@endsection
