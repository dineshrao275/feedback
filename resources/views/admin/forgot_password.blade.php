@extends('layout.master')
@section('title')Forgot Password @endsection
@section('content')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ route('forgot.password') }}" class="logo d-flex align-items-center w-auto">
                                <span class="d-none d-lg-block">Forgot Password</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <form class="row g-3 needs-validation pt-5" action="{{ route('forgot.password.details') }}" method="post" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourUsername" class="form-label">Username / Email / Mobile</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" required>
                                            @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
<!-- 
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">New Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required>
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="yourPassword" required>
                                        @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->
                                    <div class="col-12">
                                        <span class="text-right"><a href="{{ route('admin.login') }}">Login</a> Instead </span>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->
@endsection