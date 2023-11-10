@extends('layout.master')
@section('title') Topics @endsection
@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Add Topics</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.topic_table') }}">Topic Table</a></li>
        <li class="breadcrumb-item active">Add Topic</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">

      <div class="col-lg-6 m-auto mt-3">
      <div class="add-button-wrap ">
          <a href="{{ route('admin.topic_table') }}" class="btn btn-success m-3 text-right"><b>Topic Table</b></a>
        </div>
      
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Topic Details</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('add_update_topic') }}" method="post">
              @csrf
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" class="form-control" id="topicname" placeholder="Topic Name" value="{{ old('name') }}" name='topicname' required>
                  <label for="topicname">Topic Name</label>

                </div>
                @error('topicname')
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