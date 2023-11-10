<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">

  <style>
    * {
      margin: 0;
      padding: 0;
    }

    a {
      text-decoration: none;
      color: #000;
    }

    .header {
      box-shadow: 0 0 10px gray;
      background: white;
    }

    .site-logo {
      display: inline-block;
      float: left;
    }

    .site-logo img {
      height: 150px;
      width: 150px;
    }

    .site-name {
      display: inline-block;
      float: left;
    }

    .student-details input,
    .student-details select {
      margin: 1vh 1vw;
      padding: 2vh 2vw;
      font-size: 18px;
      border: none;
      outline: none;
      border-bottom: 1px solid #567;
      background: transparent;
      transition: .5s;
    }

    .student-details input:focus {
      border-radius: 30px;
      transition: .5s;
      background: lightgray;
      color: #000;
    }

    .footer {
      display: inline-block;
      text-align: center;
      position: fixed;
      bottom: 0px;
      right: 0px;
      margin-top: 200px;
    }

    .grading {
      font-family: serif;
      color: lightslategray;
    }

    .suggestion_box{
      width: 100%;
      height: 100px;
      outline: none;
      border: none;
      border-bottom: 1px solid #000;
      box-shadow: 5px 5px 5px 5px grey;
      border-radius: 20px;
      padding-left: 10px;
      font-size: 18px;
    }
  </style>



  <title>SVIMI Feedback Form</title>
</head>

<body>

  <div class="container-fluid student-info-page" style="margin-bottom: 80px;">
    <div class="row header">
      <div class="col-sm-2 site-logo text-center ">
        <img src="assets/img/logo.jpg" alt="logo">
      </div>
      <div class="col-sm-10 site-name">
        <h1 class="text-center">Shri Vaishnav Institute of Management, Indore(M.P.)</h1>
        <pre class="text-center grading">Approved by AICTE, New Delhi, Affiliated to DAVV, Indore and RGPV, Bhopal (M.P.)
UGC-NAAC Accredited ‘A’ Grade Institute
Scheme No.71, Gumasta Nagar, Indore-452009
Madhya Pradesh, India</pre>
        <div class="text-center">

          <a href="{{ route('admin.login') }}" class="btn btn-primary p-2 m-2 ">Admin Login</a>
        </div>

      </div>
    </div>
    <div class="row feedback-bolck mt-3">
      <h4 class="text-center">Faculty Feedback on Teaching Learning (FFTL)</h4>
      <p class="text-center"><b><u>*Guidelines for Students*</u></b>
        <br />
        Shri Vaishnav Institute of Management, Indore (Madhya Pradesh) is conducting Individual Faculty Feedback
        on
        Teaching Learning, which will help to upgrade the quality of teaching learning in the Institute.
        Individual student
        will have to respond to all the statements given in the following format with her/his sincere efforts
        and thoughts.
        Her/his identity will NOT be revealed.

      </p>
      <!-- Floating Labels Form -->
      <form action="{{ route('new.feedback') }}" id="student_form" method="post">

        <div class="col-lg-8 m-auto mt-3">
          <div class="card">
            <div class="card-body">
              <h1 class="card-title text-secondary">Student Details</h1>
              <div class="row g-3">
                @csrf
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" name="course_id" action="{{ route('get.course.type') }}" id="course_id" aria-label="Course">
                      <option value="">Select Course</option>
                      @if($courses)
                      @foreach($courses as $index => $course)
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

                    </select>
                    <label for="semester_year">Semester/Year</label>
                    @error('semester_year')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select selectpicker" data-live-search="true" name="section" id="section" aria-label="Section">
                      <option value="" selected disabled>Select Section</option>
                    </select>
                    <label for="section">Section</label>
                    @error('section')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="erp_id" placeholder="ERP ID" maxlength="12" name='erp_id'>
                    <label for="erp_id">ERP ID</label>
                    @error('erp_id')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="student_name" placeholder="Student Name" name='student_name' readonly>
                    <label for="student_name">Student Name</label>
                    @error('student_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="session" placeholder="Session" name='session'  readonly>
                    <label for="session">Session</label>
                    @error('session')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- feedback info -->
          <p class="text-center mt-3"><b><u>Instructions</u></b>
          <ul>
            <li>Please read the statements carefully before responding. </li>
            <li>Response to all the statements is
              mandatory. </li>
            <li>Kindly fill up your response ranging from 1 to 5.</li>
            <ul>
              <li>Outstanding (5)</li>
              <li>Excellent (4)</li>
              <li>Very Good(3)</li>
              <li>Good (2)</li>
              <li>Average (1)</li>
            </ul>
            <li> Choose the most appropriate one carefully.</li>
          </ul>
          </p>


        </div>
        <div class="table-responsive">
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>
                  Subject Code and Name
                </th>
                <th>
                  Faculty Name
                </th>
                @if($topics)
                @foreach($topics as $topic)
                <th>{{ $topic->name }}</th>
                @endforeach
                @endif
              </tr>
            </thead>
            <tbody id="feedbacktable">

            </tbody>
          </table>
        </div>
        <div class="text-center m-5"><input type="text" name="suggestion" placeholder="Suggestion here (optional)" class="suggestion_box" /></div>
        <div class="text-center">
          <button type="submit" class="btn btn-success">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>

      </form><!-- End floating Labels Form -->
    </div>
  </div>

  <!-- footer -->

  <div class="container-fluid footer ">
    <p class=" text-white p-2 bg-dark rounded">Designed by <a href="https://dineshrao275.github.io/dinesh-portfolio/" class="text-warning">Dinesh Rao </a> (Student at SVIMI) | All right reserved &copy; <?php echo date('Y') ?> SVIM, Indore </p>
  </div>

</body>

</html>


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/toastr.js') }}"></script>
<script src="{{ asset('assets/js/student-info.js') }}"></script>

@if(Session::has('success'))
<script>
  $(document).ready(function() {
    toastr.success("{{ Session::get('success') }}");
  })
</script>
@endif
@if(Session::has('error'))
<script>
  $(document).ready(function() {
    toastr.error("{{ Session::get('error') }}");
  })
</script>
@endif