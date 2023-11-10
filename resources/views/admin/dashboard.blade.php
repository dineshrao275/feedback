@extends('layout.master')
@section('title')Dashboard @endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Counting And Graph Column columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Counting Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title"> Faculties <span>| Active</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$faculties}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Faculty Counting Card -->

                    <!-- Course Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Courses <span>| Offered</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$courses}}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Courses Card -->
                    <!-- Students Card -->
                    <div class="col-xxl-4 col-xl-6">

                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Students <span>| Participated</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$students}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Feedbacks Card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive mt-5">
                            <table class="table  bordered">
                                <thead class="bg-primary text-light text-center">
                                    <tr>
                                        <th style="font-size: 30px;">Suggestions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($suggestions))
                                    @foreach($suggestions as $key => $suggestion)
                                    <tr>
                                        <td>{{ $suggestion->suggestion }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- End Counting and Graph columns -->
        </div>
    </section>
</main>
<!-- End #main -->
@endsection