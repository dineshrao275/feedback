@extends('layout.master')
@section('title') Course Table @endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Topic Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item ">Resources</li>
                <li class="breadcrumb-item active">Topic Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="add-button-wrap ">
                    <a href="{{ route('admin.topics') }}" class="btn btn-primary m-3 text-right">Add Topic</a>
                </div>
                <div class="card">
                    <div class="card-body mt-3">
                        <!-- Table with stripped rows -->
                        <table class="table text-center" id='topic_table' action="{{ route('admin.topic_table_data') }}">
                            <thead class=" ">
                                <tr>
                                    <th scope="col">Topic Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                        <!-- End Table with stripped rows -->

                        <div class="modal fade" id="update_topic_modal" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title text-primary">Update Topic Details </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Floating Labels Form -->
                                        <form class="row g-3" action="{{ route('add_update_topic') }}" method="post">
                                            @csrf
                                            <div class="col-md-12">
                                                <div class="form-floating">
                                                    <input type="hidden" name="id" id="t_id">
                                                    <input type="text" class="form-control" id="topicname" placeholder="Topic Name" name='topicname' required>
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
                        <!-- Update Modal End -->

                        <div class="modal fade" id="delete_topic_modal" tabindex="-1" aria-hidden="true" style="display: none;">
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
                                        <button type="button" class="btn btn-danger" action="{{ route('delete_topic') }}" id="delete_topic_btn" data-bs-dismiss="modal">Delete</button>
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