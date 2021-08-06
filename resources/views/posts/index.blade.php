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

                        <a class="btn btn-success" href="{{ route('posts.create') }}">Add</a>
                        <a class="btn btn-success" href="{{ route('posts.upload') }}">Upload file</a>
                        <a class="btn btn-warning" href="{{ route('export') }}">Download</a>
                    </form>

                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Posted User</th>
                <th>Posted Date</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at->format('d/m/Y') }}</td>
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
