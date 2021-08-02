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
  <div class="panel-heading">Name : {{ $name }}</div>
  <div class="panel-body">
    Email : {{ $email }}
  </div>
  <div class="panel-body">
    Password : <input id="password-field" type="password" value="{{ $password }}" style="background:transparent;border:none"><span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
  </div>
  <div class="panel-body">
    Type : {{ $type }}
  </div>
  <div class="panel-body">
    Phone : {{ $phone }}
  </div>
  <div class="panel-body">
    Date Of Birth : {{ $dob }}
  </div>
  <div class="panel-body">
    Address : {{ $address }}
  </div>
  <div class="panel-body">
    Profile : <img src="{{ asset('storage/uploads/'.$profile) }}" height="150px" width="150px">
  </div>
</div>


<form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="hidden" name="name" class="form-control" value="{{ $name }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="email" class="form-control" value="{{ $email }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="password" class="form-control" value="{{ $password }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="password_confirmation" class="form-control" value="{{ $password_confirmation }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="type" class="form-control" value="{{ $type }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="phone" class="form-control" value="{{ $phone }}">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="dob" class="form-control" value="{{ $dob }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="address" class="form-control" value="{{ $address }}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="profile" class="form-control" value="{{ $profile }}">
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
<script>
    $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
    input.attr("type", "text");
    } else {
    input.attr("type", "password");
    }
    });

    var input = document.querySelector('input#password-field'); // get the input element
    input.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
    resizeInput.call(input); // immediately call the function

    function resizeInput() {
    this.style.width = ((this.value.length + 1) * 10) + 'px';;
    }

    document.getElementById('password-field').disabled = true;

</script>
@endsection