@extends('portal.layout.main')
@section('title', 'Login')

@section('body')
  <body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6s col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @if ($errors->has('email')) is-invalid @endif" id="email" name = "email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      @if ($errors->has('email'))
                        <div class="invalid-feedback">
                          {{ $errors->first('email') }}
                        </div>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @if ($errors->has('password')) is-invalid @endif" id="password" name = "password" placeholder="Password">
                      @if ($errors->has('password'))
                        <div class="invalid-feedback">
                          {{ $errors->first('password') }}
                        </div>
                      @endif
                    </div>
                    @if($errors->has('login'))
                      <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                          <span>{{ $error }}</span>
                        @endforeach
                      </div>
                    @endif
                    <button class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
@endsection
