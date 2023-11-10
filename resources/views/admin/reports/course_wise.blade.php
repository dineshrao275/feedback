@extends('layout.master')
@section('title') Report Course Table @endsection
@section('content')
<main id="main" class="main">
 <div class="pagetitle">
        <h1>Course Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Reports</li>
                <li class="breadcrumb-item active">Course Wise</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                       <div class="table-responsive">
                       <table class="table datatable text-center " id='faculty_table'>
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($courses)
                                @foreach($courses as $course)
                                <tr>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->department }}</td>
                                    <td>{{ $course->type }}</td>
                                    <td>
                                        <a href="{{ route('admin.course.report',['id'=>$course->id]) }}" class="btn btn-info update_faculty_btn"><i class="bi bi-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                       </div>
                        <!-- End Table with stripped rows -->


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