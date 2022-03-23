@extends('portal.layout.content')
@section('title', 'Users')
@section('style')

@endsection
@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="d-flex align-items-center justify-content-center">
        <form style="width: 40%" method="POST">
          @csrf
          <div class="form-group">
            <label class="form-label" for="name-input">Name</label>
            <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif"
              value="@isset ($user['id']){{ $user['id'] }} @endif" id="name-input" name="name" placeholder="Enter name">
            @if($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="email-input">Email</label>
            <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif"
              value="@isset( $user['email'] ){{ $user['email'] }} @endisset" id="email-input" name="email"
              placeholder="Enter email">
            @if ($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="password-input">Password</label>
            <input type="password" class="form-control @if ($errors->has('password'))
            is-invalid @endif" id="password-input" name="password" placeholder="Enter password">
            @if ($errors->has('password'))
            <div class="invalid-feedback">
              {{ $errors->first('password') }}
            </div>
            @endif
          </div>
          <div class="form-group">
            <label class="form-label" for="confirm-password-input">Password</label>
            <input type="password" class="form-control @if ($errors->has('confirm-password'))
            is-invalid @endif" id="confirm-password-input" name="confirm-password"
              placeholder="Enter confirm password">
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

@endsection