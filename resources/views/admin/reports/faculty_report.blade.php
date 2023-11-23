@extends('layout.master')
@section('title') Faculty Report @endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Faculty Report</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Reports</li>
                <li class="breadcrumb-item "><a href="{{ route('report.facultywise') }}">Faculty Wise</a></li>
                <li class="breadcrumb-item active">Faculty Report</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">



                <div class="tab-content pt-2 mb-3">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview" role="tabpanel">
                        <h5 class="card-title">Faculty Details</h5>

                        <div class="row">
                            <span class="col-3 col-md-4 label ">Faculty Name : </span>
                            <span class="col-9 col-md-8">{{ $faculty->name }}</span>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-4 label">Department : </div>
                            <div class="col-9 col-md-8">{{ $faculty->department }}</div>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-4 label">Designation : </div>
                            <div class="col-9 col-md-8">{{ $faculty->designation }}</div>
                        </div>

                        <div class="row">
                            <div class="col-3 col-md-4 label">Email : </div>
                            <div class="col-9 col-md-8">{{ $faculty->email }}</div>
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
                                        <th scope="col">Total</th>
                                        <th scope="col">Performance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subjects as $key=>$subject)
                                    <tr>
                                        <td>{{ $subject->name }}</td>
                                        @foreach($topics as $topic)
                                        <td scope="col">{{ ( $average[$subject->code][$topic['database_name'] ]) ? number_format($average[$subject->code][$topic['database_name']], 2) : "-" }}</td>
                                        @endforeach
                                        <td>{{ number_format($sum[$subject->name],2) }}</td>
                                        <td>
                                        @php 
                                            $percentage = ($sum[$subject->name] / (count($topics) * 5)) * 100;
                                            if ($percentage >= 95) {
                                                echo 'Out Standing';
                                            } else if ($percentage < 95 && $percentage >= 90) {
                                                echo 'Excellent';
                                            } else if ($percentage < 90 && $percentage >= 80) {
                                                echo 'Very Good';
                                            } else if ($percentage < 80 && $percentage >= 70) {
                                                echo 'Good';
                                            } else if ($percentage < 70 && $percentage >= 60) {
                                                echo 'Average';
                                            } else if($percentage < 60 && $percentage >= 0) {
                                                echo 'Poor';
                                            } else {
                                                echo '-';
                                            }
                                        @endphp
                                        </td>
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
            <div class="col-12 text-center mt-5 mb-5"><strong>Over All Performance</strong> : 
                @php 
                    echo number_format($total_sum,2);
                    $percentage = (($total_sum / (5 * count($topics) * count($subjects))) * 100);           if ($percentage >= 95) {
                        echo '(Out Standing)';
                    } else if ($percentage < 95 && $percentage >= 90) {
                        echo '(Excellent)';
                    } else if ($percentage < 90 && $percentage >= 80) {
                        echo '(Very Good)';
                    } else if ($percentage < 80 && $percentage >= 70) {
                        echo '(Good)';
                    } else if ($percentage < 70 && $percentage >= 60) {
                        echo '(Average)';
                    } else if($percentage < 60 && $percentage >= 0) {
                        echo '(Poor)';
                    } else {
                        echo '-';
                    }
                @endphp
        </div>
            <div class="col-12 text-center"><button type="button" class="btn btn-success" onclick="window.print()">Print</button></div>
        </div>
    </section>

</main><!-- End #main -->
@endsection