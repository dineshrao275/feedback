@extends('layout.master')
@section('title') Subjects @endsection
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Subject</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.subject_table') }}">Subject Table</a></li>
        <li class="breadcrumb-item active">Add Subject</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="col-lg-8 m-auto mt-3">
      <div class="add-button-wrap ">
          <a href="{{ route('admin.subject_table') }}" class="btn btn-success m-3 text-right"><b>Subject Table</b></a>
        </div>
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Subject Details</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('add_update_subject') }}" id="subject_form" method="post">
              @csrf
              <div class="col-md-6">
                <div class="form-floating mb-3">
                  <select class="form-select" name="course_id" id="course_id" aria-label="Course">
                    @if($courses)
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                    @endif

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
                    @if($semester_year && $semester_year == 'Master')
                    <option value='I'>I</option>
                    <option value='II'>II</option>
                    <option value='III'>III</option>
                    <option value='IV'>IV</option>
                    @elseif($semester_year && $semester_year == 'Bachelor')
                    <option value='I'>I</option>
                    <option value='II'>II</option>
                    <option value='III'>III</option>
                    @endif
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
                  @if($faculties)
                  @foreach($faculties as $faculty)
                  <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                  @endforeach
                  @endif
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
                  <input type="text" class="form-control" id="subjectname" placeholder="Subject Name" name='name'>
                  <label for="subjectname">Subject Name</label>
                  @error('name')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
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
  </section>

</main><!-- End #main -->


@endsection