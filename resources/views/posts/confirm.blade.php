@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Post Confirm</h2>
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
  <div class="panel-heading">Post Title : {{ $title }}</div>
  <div class="panel-body">
    Post Description : {{ $description }}
  </div>
</div>


<form action="{{ route('posts.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="hidden" name="title" class="form-control" placeholder="Title" value="{{ $title }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="description" class="form-control" placeholder="Title" value="{{ $description }}">
            </div>
        </div>

        <div class="mr-5">
            <button type="submit" class="btn btn-primary">Create</button>
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