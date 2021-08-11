@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pull-left">
                    <h2>Update Post</h2>
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

        <form action="{{ route('posts.editConfirm', $post->id) }}" method="POST">
            @csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control"
                            placeholder="Title">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <textarea class="form-control" style="height:150px" name="description"
                            placeholder="Description">{{ $post->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                        <div class="col-md-6">
                            <div class="custom-control custom-switch col-md-6 mt-2">
                                <input type="checkbox" class="custom-control-input @error('status') is-invalid @enderror"
                                    name="status" id="status" value="{{ $post->status }}" @if($post->status == 1) checked @endif>
                                <label class="custom-control-label" for="status"></label>

                            </div>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-8 text-center">
                    <button type="submit" class="btn btn-primary">Confirm</button>
                    <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        $( document ).ready(function() {
            $('#status').on('change', function() {
                this.value = this.checked ? 1 : 0;
            }).change();
        });
    </script>
@endsection
