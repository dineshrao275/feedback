@extends('layout.master')
@section('title') Create User @endsection
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Create User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Create User</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="col-lg-8 m-auto mt-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User Details</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" action="{{ route('newUser') }}">
              @csrf
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" placeholder="Your Username" name='username' value="{{ old('username') }}" required>
                  <label for="floatingName">Your Username</label>
                </div>
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingName" placeholder="Your Contact" name='contact' value="{{ old('contact') }}" required>
                  <label for="floatingName">Your Contact</label>
                </div>
                @error('contact')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email" name="email" value="{{ old('email') }}" required>
                  <label for="floatingEmail">Your Email</label>
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" value="{{ old('password') }}" required>
                  <label for="floatingPassword">Password</label>
                </div>
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Create</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End floating Labels Form -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body mt-3">
            <div style="margin:10px;">
              <h3 style="margin: auto;padding:10px;color:blue;">User Table</h3>
            </div>
            <div class="table-responsive">
              <table class="table" id='user_table' action="{{ route('admin.user_table_data') }}">
                <thead>
                  <tr>
                    <th scope="col">UserName</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- End Table with stripped rows -->

            <div class="modal fade" id="delete_user_modal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure to remove this User</h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" action="{{ route('admin.delete_user') }}" id="delete_user_btn" data-bs-dismiss="modal">Delete</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Delete Modal End  -->
          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->


@endsection