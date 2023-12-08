@include('includes.header_styles')
@include('includes.header')
@include('includes.sidebar')
@include('includes.footer')
@include('includes.footer_scripts')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicons -->
  <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
  @yield('header_styles')
  
  <title>@yield('title') - SVIM</title>
</head>
<body class = "@yield('body-class')">
    
    @yield('header')
    @yield('sidebar')
    @yield('content')
    @yield('footer')
    @yield('footer_scripts')
    @if($js)
    @foreach($js as $njs)
    <script src="{{ asset('assets/js/'.$njs.'.js') }}"></script>
    @endforeach
    @endif

    <!-- <script src="{{ asset('assets/js/jquery.js') }}"></script> -->
    @if(Session::has('success'))
    <script>
        $(document).ready(function() {
            toastr.success('{{ Session::get("success") }}')
        })
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        $(document).ready(function() {
            toastr.error('{{ Session::get("error") }}')
        })
    </script>
    @endif
</body>

</html>