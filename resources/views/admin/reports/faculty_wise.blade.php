@extends('layout.master')
@section('title') Report Faculty Table @endsection
@section('content')
<main id="main" class="main">
 <div class="pagetitle">
        <h1>Faculty Table</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Reports</li>
                <li class="breadcrumb-item active">Faculty Wise</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table datatable text-center " id='faculty_table'>
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($faculties)
                                @foreach($faculties as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->department }}</td>
                                    <td>
                                        <a href="{{ route('admin.faculty.report',['id'=>$value->id]) }}" class="btn btn-info update_faculty_btn"><i class="bi bi-eye"></i> View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
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