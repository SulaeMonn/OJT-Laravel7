@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Mail Send</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                @error('email')
                    <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <strong>Suggestion:</strong>
                <textarea name="suggestion" rows="5" class="form-control" placeholder="Enter Your Message"></textarea>
                @error('suggestion')
                    <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Attachments:</label>
                <input type="file" name="files" class="form-control">
                @error('files')
                    <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-check">
                <input type="checkbox" name="files" class="form-check-input" id="checkbox"
                    onchange="document.getElementById('submit').disabled = !this.checked;">
                <label class="form-check-label" for="checkbox">
                    Agreement to send
                </label>
                @error('files')
                    <span class="text-danger"> {{ $message }} </span>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success save-data" id="submit" disabled>Send Email</button>
                <button type="reset" class="btn btn-success save-data">Cancel</button>
            </div>
        </form>
    </div>

@endsection
