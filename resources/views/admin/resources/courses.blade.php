@extends('layout.master')
@section('title') Courses @endsection
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.course_table') }}">Course Table</a></li>
        <li class="breadcrumb-item active">Add Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="col-lg-6 m-auto mt-3">
        <div class="add-button-wrap ">
          <a href="{{ route('admin.course_table') }}" class="btn btn-success m-3 text-right"><b>Course Table</b></a>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Course Details</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('add_update_course') }}" method="post">
              @csrf
              <div class="col-md-12">
                <div class="form-floating mb-3">
                  <select class="form-select" value="{{ old('department') }}" name='department' id="department" aria-label="Department" required>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Management">Management</option>
                  </select>
                  <label for="department">Department</label>
                  @error('department')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating mb-3">
                  <select class="form-select" value="{{ old('type') }}" name='type' id="type" aria-label="Course Type" required>
                    <option value="Master">Master</option>
                    <option value="Bachelor">Bachelor</option>
                  </select>
                  <label for="type">Course Type</label>
                  @error('type')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="coursename" placeholder="Course Name" value="{{ old('name') }}" name='name' required>
                  <label for="coursename">Course Name</label>

                </div>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>


              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
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