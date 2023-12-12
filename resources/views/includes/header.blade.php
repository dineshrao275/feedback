 @section('header')
 
 @if(Route::currentRouteName() == 'admin.login' || Route::currentRouteName() == 'forgot.password' || Route::currentRouteName() == 'reset.password' )
 @else
 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

   <div class="d-flex align-items-center justify-content-between">
     <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
       <img src="{{ asset('assets/img/logo.jpg') }}" alt="">
       <span class="d-none d-lg-block">SVIMI</span>
     </a>
     <i class="bi bi-list toggle-sidebar-btn"></i>
   </div><!-- End Logo -->
   <div class="search-bar text-center">
     <h3 class="text-primary">Shri Vaishnav Institute of Management,Indore</h3>
   </div><!--End Search Bar -->
   <nav class="header-nav ms-auto">
     <ul class="d-flex align-items-center">
       <li class="nav-item dropdown pe-3">

         <a class="nav-link nav-profile d-flex align-items-center pe-0" href="javascript:void(0)" data-bs-toggle="dropdown">
           <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
         </a><!-- End Profile Iamge Icon -->

         <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           <li>
             <hr class="dropdown-divider">
           </li>

           <li>
             <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
               <i class="bi bi-person"></i>
               <span>My Profile</span>
             </a>
           </li>
           <li>
             <hr class="dropdown-divider">
           </li>


           <li>
             <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
               <i class="bi bi-box-arrow-right"></i>
               <span>Sign Out</span>
             </a>
           </li>

         </ul><!-- End Profile Dropdown Items -->
       </li><!-- End Profile Nav -->

     </ul>
   </nav><!-- End Icons Navigation -->

 </header><!-- End Header -->
 @endif
 @endsection