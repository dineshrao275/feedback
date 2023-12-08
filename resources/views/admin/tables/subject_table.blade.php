@extends('layout.master')
@section('title') Subject Table @endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Subject Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item ">Resources</li>
        <li class="breadcrumb-item active">Subject Table</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="add-button-wrap ">
          <a href="{{ route('admin.subjects') }}" class="btn btn-primary m-3 text-right">Add Subject</a>
        </div>
        <div class="card">
          <div class="card-body mt-3">
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table table-bordered" id='subject_table' action="{{ route('admin.sutdent_table_data') }}">
                <thead>
                  <tr>
                    <th scope="col">Course</th>
                    <th scope="col">Semester/Year</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Section</th>
                    <th scope="col">Subject Code</th>
                    <th scope="col">Subject Name</th>
                    <th scope="col" style="min-width: 90px;">Action</th>
                  </tr>
                </thead>
              </table>

            </div>
            <!-- End Table with stripped rows -->
            <div class="modal fade" id="delete_subject_modal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure to delete this Subject </h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger " action = "{{ route('delete_subject') }}" id="delete_subject_btn" data-bs-dismiss="modal">Delete</button>
                  </div>
                </div>
              </div>
            </div> <!-- delete modal  -->
            <div class="modal fade" id="update_subject_modal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title text-primary">Update Subject Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" action="{{ route('add_update_subject') }}" id="subject_form" method="post">
                      @csrf
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="hidden" name="id" id="s_id">
                          <select class="form-select" name="course_id" id="course_id" aria-label="Course">
                            <option value="">Select Course</option>
                          </select>
                          <label for="course_id">Course</label>
                          @error('course_id')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <select class="form-select" name="semester_year" id="semester_year" aria-label="Semester/Year">
                            <option value="">Select Semester/Year</option>
                            <option value='I'>I</option>
                            <option value='II'>II</option>
                            <option value='III'>III</option>
                            <option value='IV'>IV</option>
                          </select>
                          <label for="semester_year">Semester/Year</label>
                          @error('semester_year')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <select class="form-select selectpicker" data-live-search="true" name="faculty_id" id="faculty_id" aria-label="Faculty">
                          </select>
                          <label for="faculty_id">Faculty</label>
                          @error('faculty_id')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="section" placeholder="Section" maxlength="1" name='section'>
                          <label for="section">Section</label>
                          @error('section')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" id="subjectcode" placeholder="Subject Code" name='code'>
                          <label for="subjectcode">Subject Code</label>
                          @error('code')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="text" class="form-control" id="name" placeholder="Subject Name" name='name'>
                          <label for="name">Subject Name</label>
                          @error('name')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                      </div>
                    </form><!-- End floating Labels Form -->


                  </div>
                </div>
              </div>
            </div>
            <!-- update button modal -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection