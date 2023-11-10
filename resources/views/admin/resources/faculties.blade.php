@extends('layout.master')
@section('title') Faculties @endsection
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Faculty</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.faculty_table') }}">Faculty Table</a></li>
        <li class="breadcrumb-item active">Add Faculty</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="col-lg-8 m-auto mt-3">
      <div class="add-button-wrap ">
          <a href="{{ route('admin.faculty_table') }}" class="btn btn-success m-3 text-right"><b>Faculty Table</b></a>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Faculty Details</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('newfaculty') }}" method="post">
              @csrf
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="hidden" value="" name="id" >
                  <input type="text" class="form-control" id="floatingName" placeholder="Full Name" value="{{ old('name') }}" name='name' required>
                  <label for="floatingName">Full Name</label>
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 text-center">
                <div>
                <label for="Gender">Gender : </label>
                  <input type="radio" value="Male" class="mt-4" selected name="gender" checked required> Male
                  &nbsp;&nbsp;&nbsp;
                  <input type="radio" value="Female" selected name="gender" required> Female
                  @error('gender')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingEmail" placeholder="Email" value="{{ old('email') }}" name="email" required>
                  <label for="floatingEmail">Email</label>
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-floating">
                  <select class="form-select" value="{{ old('department') }}" id="floatingSelect" aria-label="State" name="department">
                    <option value="Management">Management</option>
                    <option value="Computer Science">Computer Science</option>
                  </select>
                  <label for="floatingSelect">Department</label>
                  @error('department')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-12">
                  <div class="form-floating">
                    <select class="form-select" id="floatingSelect" aria-label="State" value="{{ old('designation') }}" name="designation">
                      <option value="Proffessor and Director">Proffessor and Director</option>
                      <option value="Proffessor">Proffessor</option>
                      <option value="Associate Proffessor">Associate Proffessor</option>
                      <option value="Assistant Proffessor">Assistant Proffessor</option>
                    </select>
                    <label for="floatingSelect">Designation</label>

                    @error('designation')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror

                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <input type="date" class="form-control" id="floatingCity" value="{{ old('doj') }}" name="doj" placeholder="Date of joining"  required>
                  <label for="floatingCity">Date of Joining</label>
                  @error('doj')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
          </div>
          <div class="text-center p-3">
            <button type="submit" class="btn btn-primary ">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
          </form><!-- End floating Labels Form -->

        </div>
      </div>

    </div>
    </div>
  </section>

</main><!-- End #main -->


@endsection
