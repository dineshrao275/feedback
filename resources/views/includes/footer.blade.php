@section('footer')

@if(Route::currentRouteName() == 'admin.login' || Route::currentRouteName() == 'forgot.password' || Route::currentRouteName() == 'reset.password')
 @else
<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
   <div class="copyright">
     &copy; Copyright {{ date('Y') }} | <strong><span>SVIMI</span></strong>. All Rights Reserved
   </div>
   <div class="credits">
      Designed by <a href="https://dineshrao275.github.io/dinesh-portfolio/">Dinesh Rao (Student At SVIM)</a>
   </div>
 </footer><!-- End Footer -->

 <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 @endif
@endsection