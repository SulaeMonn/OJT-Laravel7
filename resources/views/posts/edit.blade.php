@extends('layouts.app')
   
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
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
  
    <form action="{{ route('posts.update',$post->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $post->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $post->description }}</textarea>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Status:</strong>
                    <input type="text" name="status" value="{{ $post->status }}" class="form-control">
                </div>
            </div>
            <div class="col-md-8 text-center">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </form>
    </div>
@endsection