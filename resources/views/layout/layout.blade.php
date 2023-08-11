<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaruDryFruit | Nutritious Fruits and Nuts</title>
    <!-- <link rel="icon" type="image/x-icon" href="fontend/Image/grape_bigger.png"> icon tren tab bar -->
    <link rel="icon" type="image/x-icon" href="{{ asset('fontend/Image/icongrape.png') }}"> <!--icon tren tab bar-->
    <link rel="stylesheet" href="{{ asset('fontend/CSS/css_1.css') }}"><!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> <!--BOOTSTRAP 5-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script> <!--BOOTSTRAP 5-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--Google Fonts-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer"/> <!--font awesome/icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!--BOOTSTRAP ICON - fb twitter-->
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<link rel="stylesheet" href="{{ asset('fontend/CSS/checkout.css') }}">
<link rel="stylesheet" href="{{ asset('fontend/CSS/signin.css') }}">

</head>




<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  {{-- @include('layout.nav', ['user' => $user]) --}}
   @include('layout.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
   {{-- @include('layout.slidebar') --}}

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  @include('chat')
</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
   @include('layout.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular-route.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script> <!--jQuery-->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> <!-- AlertifyJS-->

<script src="{{ asset('fontend/JS/script.js') }}"></script>
<script src="{{ asset('fontend/JS/location.js') }}"></script>
<script src="{{ asset('fontend/JS/oldaddress.js') }}"></script>
<script src="{{ asset('fontend/JS/paypal.js') }}"></script>
<script src="{{ asset('fontend/JS/freeship.js') }}"></script>
<script src="{{ asset('fontend/JS/voucher.js') }}"></script>


<script src="/js/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
<script src="/js/jquery-cookie.js"></script>
<script src="/js/chattle_customer.js"></script>



@yield('script-content')
</body>
</html>
