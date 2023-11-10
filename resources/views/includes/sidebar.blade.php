 @section('sidebar')
 
 @if(Route::currentRouteName() == 'admin.login' || Route::currentRouteName() == 'forgot.password' )
 @else
 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

   <ul class="sidebar-nav" id="sidebar-nav">

     <li class="nav-item {{ Route::currentRouteName() === 'admin.dashboard' ? 'active' : '' }}"  >
       <a class="nav-link" href="{{ route('admin.dashboard') }}">
         <i class="bi bi-grid"></i>
         <span>Dashboard</span>
       </a>
     </li><!-- End Dashboard Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="javascript:void(0)">
         <i class="bi bi-menu-button-wide"></i><span>Resources</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="components-nav" class="nav-content collapse {{ Request::route()->getName() === 'admin.student_table' || Request::route()->getName() === 'admin.faculty_table' || Request::route()->getName() === 'admin.subject_table' || Request::route()->getName() === 'admin.course_table' || Request::route()->getName() === 'admin.topic_table' ? 'show' : '' }} " data-bs-parent="#sidebar-nav">
         <li class="{{ Route::currentRouteName() === 'admin.student_table' ? 'active' : '' }}">
           <a href="{{ route('admin.student_table') }}">
             <i class="bi bi-people"></i><span>Students</span>
           </a>
         </li>
         <li class="{{ Route::currentRouteName() === 'admin.faculty_table' ? 'active' : '' }}">
           <a href="{{ route('admin.faculty_table') }}">
             <i class="bi bi-people"></i><span>Faculties</span>
           </a>
         </li>
         <li class="{{ Route::currentRouteName() === 'admin.subject_table' ? 'active' : '' }}">
           <a href="{{ route('admin.subject_table') }}">
             <i class="bi bi-book"></i><span>Subjects</span>
           </a>
         </li>
         <li class="{{ Route::currentRouteName() === 'admin.course_table' ? 'active' : '' }}">
           <a href="{{ route('admin.course_table') }}">
             <i class="bi bi-book"></i><span>Courses</span>
           </a>
         </li>
         <li class="{{ Route::currentRouteName() === 'admin.topic_table' ? 'active' : '' }}">
           <a href="{{ route('admin.topic_table') }}">
             <i class="bi bi-chat-text"></i><span>Topics</span>
           </a>
         </li>
       </ul>
     </li><!-- End Components Nav -->

     <li class="nav-item">
       <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="javascript:void(0)">
         <i class="bi bi-bar-chart"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
       </a>
       <ul id="charts-nav" class="nav-content collapse {{ Request::route()->getName() === 'report.facultywise' || Request::route()->getName() === 'admin.coursewise' ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
         <li class="{{ Route::currentRouteName() === 'report.facultywise' ? 'active' : '' }}">
           <a href="{{ route('report.facultywise') }}">
             <i class="bi bi-person"></i><span>Faculty Wise</span>
           </a>
         </li>
         <li class="{{ Route::currentRouteName() === 'admin.coursewise' ? 'active' : '' }}">
           <a href="{{ route('admin.coursewise') }}">
             <i class="bi bi-card-list"></i><span>Course Wise</span>
           </a>
         </li>
       </ul>
     </li><!-- End Charts Nav -->

     <li class="nav-heading">Accounts</li>

     <li class="nav-item {{ Route::currentRouteName()=== 'admin.profile' ? 'active' : '' }} ">
       <a class="nav-link" href="{{ route('admin.profile') }}">
         <i class="bi bi-card-list"></i>
         <span>Profile</span>
       </a>
     </li><!-- End Profile Page Nav -->
    @if(Auth::user()->type == 'super_user')
     <li class="nav-item {{ Route::currentRouteName()=== 'admin.create_user' ? 'active' : '' }}">
       <a class="nav-link" href="{{ route('admin.create_user') }}">
         <i class="bi bi-person"></i>
         <span>Create User</span>
       </a>
     </li><!-- End Create User Page Nav -->
    @endif
     <li class="nav-item {{ Route::currentRouteName()=== 'admin.logout' ? 'active' : '' }}">
       <a class="nav-link" href="{{ route('admin.logout') }}">
         <i class="bi bi-box-arrow-right"></i>
         <span>Logout</span>
       </a>
     </li><!-- End Create User Page Nav -->
   </ul>
 </aside><!-- End Sidebar-->
 @endif
 @endsection