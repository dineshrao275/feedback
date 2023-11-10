@extends('layout.master')
@section('title') Faculty Report @endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Course Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Reports</li>
                <li class="breadcrumb-item "><a href="{{ route('admin.coursewise') }}">Course Wise</a></li>
                <li class="breadcrumb-item active">Course Report</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="tab-content pt-2 mb-3">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                        <h5 class="card-title">Course Details</h5>

                        <div class="row">
                            <span class="col-3 col-md-4 label ">Course Name : </span>
                            <span class="col-9 col-md-8">{{ $course->name }}</span>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-4 label">Department : </div>
                            <div class="col-9 col-md-8">{{ $course->department }}</div>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-4 label">Type : </div>
                            <div class="col-9 col-md-8">{{ $course->type }}</div>
                        </div>
                    </div>

                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            @if(count($subjects) > 0)
                            <table class="table mt-3 table-bordered text-center " id='faculty_table'>
                                <thead class="bg-secondary text-light">
                                    <tr>
                                        <th scope="col">Subjects</th>
                                        @if(!empty($topics))
                                        @foreach($topics as $key => $topic)
                                        <th scope="col">{{ $topic['name']}}</th>
                                        @endforeach
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $key=>$subject)
                                    <tr>
                                        <td>{{ $subject->name }} ( {{ $subject->faculty_name }} ) </td>
                                        @foreach($topics as $topic)
                                        <td scope="col">{{ ( $average[$subject->code][$topic['database_name'] ]) ? ceil($average[$subject->code][$topic['database_name']]) : "-" }}</td>
                                        @endforeach
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="m-3">
                                <h3 class="text-center">No subject found.</h3>
                            </div>
                            @endif
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
            <div class="col-12 text-center"><button type="button" class="btn btn-success" onclick="window.print()">Print</button></div>
        </div>
    </section>

</main><!-- End #main -->
@endsection