@extends('layout.master')
@section('title') Student Table @endsection
@section('body-class') student_table @endsection
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Student Table</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item ">Resources</li>
        <li class="breadcrumb-item active">Student Table</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
      <div class="add-button-wrap ">
          <a href="{{ route('admin.dashboard') }}" class="btn btn-success m-3 text-right"><b>Back</b></a>
        </div>
      
        <div class="card">
          <div class="card-body mt-3">
            <!-- Table with stripped rows -->
            <div class="table-responsive student_table">
              <table class="table table-bordered " id='student_table' action="{{ route('admin.student_table_data') }}" >
                <thead class="">
                  <tr>
                    <th scope="col">ERP ID</th>
                    <th scope="col">Name</th>
                    <th scope="col" >Course</th>
                    <th scope="col">Semester/Year</th>
                    <th scope="col">Section</th>
                    <th scope="col">Session</th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- End Table with stripped rows -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection