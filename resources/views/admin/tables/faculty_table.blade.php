@extends('layout.master')
@section('title') Faculty Table @endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Faculty Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item">Resources</li>
        <li class="breadcrumb-item active">Faculty Table</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="add-button-wrap ">
          <a href="{{ route('admin.faculties') }}" class="btn btn-primary m-3 text-right" >Add Faculty</a>
        </div>
        <div class="card">
          <div class="card-body mt-3">
            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table table-bordered" id='faculty_table' action="{{ route('admin.faculty_table_data') }}">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col" style="min-width: 90px;">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- End Table with stripped rows -->

            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h4>Are you sure to delete this Record </h4>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-danger " id="delete_faculty_btn" 
                      action="{{ route('delete_faculty') }}" data-bs-dismiss="modal">Delete</button>
                  </div>
                </div>
              </div>
            </div> <!-- delete modal  -->
            <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title text-primary">Update Faculty Details</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" action="{{ route('newfaculty') }}" method="post">
                      @csrf
                      <div class="col-md-12">
                        <div class="form-floating">
                          <input type="hidden" id='f_id' name="id">
                          <input type="text" class="form-control" id="floatingName" placeholder="Full Name" value="" name='name' required>
                          <label for="floatingName">Full Name</label>
                          @error('name')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input type="email" class="form-control" id="floatingEmail" placeholder="Email" name="email" required>
                          <label for="floatingEmail">Email</label>
                          @error('email')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6 text-center">
                        <div>
                          <label for="Gender">Gender : </label>
                          <input type="radio" class="male" id='gender' value="Male" class="mt-4"  name="gender" required> Male
                          &nbsp;&nbsp;&nbsp;
                          <input type="radio" class="female" id='gender' value="Female"  name="gender" required> Female
                          @error('gender')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating">
                          <select class="form-select" id="department" aria-label="State" name="department">
                            <option value="Management">Management</option>
                            <option value="Computer Science">Computer Science</option>
                          </select>
                          <label for="department">Department</label>
                          @error('department')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="col-md-12">
                          <div class="form-floating">
                            <select class="form-select" id="designation" aria-label="State" name="designation">
                              <!-- <option selected disabled>Select Designation</option> -->
                              <option value="Proffessor and Director">Proffessor and Director</option>
                              <option value="Proffessor">Proffessor</option>
                              <option value="Associate Proffessor">Associate Proffessor</option>
                              <option value="Assistant Proffessor">Assistant Proffessor</option>
                            </select>
                            <label for="designation">Designation</label>

                            @error('designation')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror

                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" id="doj" name="doj" placeholder="Date of joining" required>
                          <label for="floatingCity">Date of Joining</label>
                          @error('doj')
                          <p class="text-danger">{{ $message }}</p>
                          @enderror
                        </div>
                      </div>
                  </div>
                  <div class="text-center m-2">
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