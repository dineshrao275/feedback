@extends('layout.master')
@section('title')Login @endsection
@section('content')
<main>
  <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
              <a href="{{ route('admin.login') }}" class="logo d-flex align-items-center w-auto">
                <img src="assets/img/logo.jpg" alt="">
                <span class="d-none d-lg-block">Admin Login</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">SignIn to Your Account</h5>
                  <p class="text-center small">Enter your username & password to login</p>
                </div>

                <form class="row g-3 needs-validation" action="{{ route('loginDetails') }}" method="post" novalidate>
                  @csrf
                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="username" value="{{ old('name') }}" required>
                      @error('username')
                      <p class="invalid-feedback">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    @error('password')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                  </div>

                <div class="col-12">
                    <span class="text-right"> <a href="{{ route('forgot.password') }}">forgot password</a> </span>
                  </div>
                  
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                  </div>
                </form>
                <div class="col-12 mt-2">
                  <a class="btn btn-warning w-100" href="{{ route('student_info') }}">Back</a>

                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
@endsection