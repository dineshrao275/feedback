@extends('layout.master')
@section('title') Course Table @endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Course Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item ">Resources</li>
        <li class="breadcrumb-item active">Course Table</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
      <div class="add-button-wrap ">
          <a href="{{ route('admin.courses') }}" class="btn btn-primary m-3 text-right" >Add Course</a>
        </div>
        <div class="card">
          <div class="card-body mt-3">
            <div class="table-responsive">
            <table class="table" id='course_table' action="{{ route('admin.course_table_data') }}">
              <thead>
                <tr>
                  <th scope="col">Course Name</th>
                  <th scope="col">Department</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
            </table>
            
            </div>

            <div class="modal fade" id="update_course_modal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title text-primary">Update Course Details </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" action="{{ route('add_update_course') }}" method="post">
                      @csrf
                      <input type="hidden" name="id" id="c_id">
                      <div class="col-md-12">
                        <div class="form-floating mb-3">
                          <select class="form-select" name='department' id="department" aria-label="Department" required>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Management">Management</option>
                          </select>
                          <label for="department">Department</label>
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
                          <input type="text" class="form-control" id="coursename" placeholder="Course Name" name='name' required>
                          <label for="coursename">Course Name</label>
                        </div>
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
            <!-- Update Modal End -->

            <div class="modal fade" id="delete_course_modal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure to remove this Course </h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger" action="{{ route('delete_course') }}" id="delete_course_btn" data-bs-dismiss="modal">Delete</button>
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