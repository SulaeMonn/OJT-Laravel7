@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Post List</h2>
                </div>
                <div class="pull-right">
                    <form action="{{ route('posts.search') }}" method="GET" class="search">
                        <input type="text" name="search" required />
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                    <a class="btn btn-success" href="{{ route('posts.create') }}">Add</a>
                </div>
            </div>
        </div>

        <div class="card bg-light mt-3">
            <div class="card-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                    <a class="btn btn-warning" href="{{ route('export') }}">Download</a>
                </form>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->description }}</td>
                    <td><a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
                    <td>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $posts->links() }}
    </div>
@endsection
