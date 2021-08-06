@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Update Post Confirmation</h2>
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
                            <div class="col-6">Title:</div>
                            <div class="col-6">{{ $title }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Description:</div>
                            <div class="col-6">{{ $description }}</div>
                        </div>
                        <div class="row justify-content-start mb-4">
                            <div class="col-6">Status:</div>
                            <div class="col-6">{{ $status }}</div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
        
                            <input type="hidden" name="title" class="form-control" placeholder="Title" value="{{ $title }}">
                            <input type="hidden" name="description" class="form-control" placeholder="Description"
                                value="{{ $description }}">
                            <input type="hidden" name="status" class="form-control" value="{{ $status }}">
        
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ URL::previous() }}" class="btn btn-primary"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
