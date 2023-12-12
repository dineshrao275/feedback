@extends('layout.master')
@section('title')Reset Password @endsection
@section('content')
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="{{ route('forgot.password') }}" class="logo d-flex align-items-center w-auto">
                                <span class="d-none d-lg-block">Reset Password</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <form class="row g-3 needs-validation pt-5" action="{{ route('reset.password.store') }}" method="post" novalidate>
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}" />
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
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Update</button>
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