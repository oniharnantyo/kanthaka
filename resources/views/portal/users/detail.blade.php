@extends('portal.layout.content')
@section('title', 'Users')
@section('style')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css"
  media="screen" charset="utf-8">
@endsection
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">

        <form style="width: 50%" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{ $user['id'] }}">
          <div class="form-group">
            <label class="form-label" for="name-input">Name</label>
            <input type="text" class="form-control" value="{{ $user['name'] }}" @if ($errors->has('name'))
            is-invalid @endif" id="name-input" name = "name" placeholder="Enter name">
            @if ($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="email-input">Email</label>
            <input type="text" class="form-control" value="{{ $user['email'] }}" @if ($errors->has('email'))
            is-invalid @endif" id="email-input" name = "email" placeholder="Enter email">
            @if ($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="update-password-checkbox">
              <label class="form-check-label" for="update-password-checkbox">
                Update password
              </label>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label" for="password-input">Password</label>
            <input type="text" class="form-control" @if ($errors->has('password'))
            is-invalid @endif" id="password-input" name = "password" placeholder="Enter password" disabled>
            @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="confirm-password-input">Password</label>
            <input type="text" class="form-control" @if ($errors->has('confirm-password'))
            is-invalid @endif" id="confirm-password-input" name = "confirm-password"
            placeholder="Enter confirm password" disabled>
            @if ($errors->has('confirm-password'))
            <div class="invalid-feedback">
              {{ $errors->first('confirm-password') }}
            </div>
            @endif
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')

<script>
  $(document).ready(function() {
      $('#update-password-checkbox').click(function () {
        if ($(this).is(':checked')) {
          $('#password-input').removeAttr('disabled');
          $('#confirm-password-input').removeAttr('disabled');
        } else {
          $('#password-input').attr('disabled', true); 
          $('#confirm-password-input').attr('disabled', true);
        }
      });
  });
</script>

@endsection