@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2> Upload CSV File</h2>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
