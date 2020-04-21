<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KendariEvent</title>
  <!--Meta-->
  @include('Shared.Partials.GlobalMeta')
   <!--/Meta-->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Vendor CSS Files -->
    {!! HTML::style(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/bootstrap/css/bootstrap.min.css') !!}
    {!! HTML::style(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/animate.css/animate.min.css') !!}
    {!! HTML::style(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/venobox/venobox.css') !!}
    {!! HTML::style(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/font-awesome/css/font-awesome.min.css') !!}
    {!! HTML::style(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/owl.carousel/assets/owl.carousel.min.css') !!}

  <!-- Template Main CSS File -->
    {!! HTML::style(config('attendize.cdn_url_static_assets').'/vendor_landing/css/style.css') !!}

</head>

<body>

  <!-- ======= Header ======= -->
  @yield('header')
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#intro">The<span>Event</span></a></h1>-->
        <a href="index.html" class="scrollto"><img src="{{asset('vendor_landing/img/kendarievent-logo.png')}}" alt="" title=""></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{ Request::is('*home*') ? 'menu-active' : '' }}"><a href="{{ url('/home') }}">Home</a></li>
          <li class="{{ Request::is('*event*') ? 'menu-active' : '' }}"><a href="{{ url('/event') }}">Event</a></li>
          <li class="{{ Request::is('*news*') ? 'menu-active' : '' }}"><a href="{{ url('/news') }}">News</a></li>
          <li><a href="{{ url('/login') }}">Sign In</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- End Header -->

    <!-- content -->
    @yield('content')
    <!-- end content -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="{{asset('vendor_landing/img/kendarievent-logo.png')}}" alt="TheEvenet">
            <p>It's all about Event!</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="{{ url('/home') }}">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="{{ url('/event') }}">Event</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="{{ url('/news') }}">Berita</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Jl. H.Supu Yusuf No. 1 <br>
              Kendari, Sulawesi Tenggara<br>
              Indonesia <br>
              <strong>Phone:</strong> 0811 4033 666<br>
              <strong>Email:</strong> kendari.event@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://www.facebook.com/kendarievent/" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/kendarievent/" class="instagram"><i class="fa fa-instagram"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>KendariEvent</strong>.
      </div>
      <div class="credits">
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- Vendor JS Files -->
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/jquery/jquery.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/jquery.easing/jquery.easing.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/php-email-form/validate.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/wow/wow.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/venobox/venobox.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/owl.carousel/owl.carousel.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/superfish/superfish.min.js') !!}
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/vendor/hoverIntent/hoverIntent.js') !!}

  <!-- Template Main JS File -->
    {!! HTML::script(config('attendize.cdn_url_static_assets').'/vendor_landing/js/main.js') !!}
</body>

</html>