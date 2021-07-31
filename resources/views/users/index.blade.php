@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>User List</h2>
                    </div>

                    <div class="pull-right">
                        <form action="{{ route('users.search') }}" method="GET" class="search">
                            <input type="text" name="search" required />
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                        <a class="btn btn-success" href="{{ route('users.create') }}">Add</a>
                    </div>
                </div>


                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Created User</td>
                            <td>Phone</td>
                            <td>BirthDate</td>
                            <td>Address</td>
                            <td>Created Date</td>
                            <td>Updated Date</td>
                            <td colspan=2>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->dob }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>{{ $user->updated_at->format('d/m/Y') }}</td>
                                
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    @endsection
