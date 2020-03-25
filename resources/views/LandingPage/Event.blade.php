@extends('Shared.Layouts.MasterLandingPage')

@section('header')
<header id="header" class="header-fixed">
@stop

@section('content')
<main id="main" class="main-page">
    <input type="hidden" id="menu" value="event">

    <!-- ======= Speakers Section ======= -->
    <section id="speakers" class="wow fadeInUp">
        <div class="container">
          <div class="section-header">
            <h2>Event</h2>
            <p>Upcoming Events</p>
          </div>
  
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset('vendor_landing/img/speakers/1.jpg')}}" alt="Speaker 1" class="img-fluid">
                <div class="details">
                  <h3><a href="speaker-details.html">Judul Event</a></h3>
                  <p>Tempat</p>
                  <div class="social">
                    <p>01-01-2000</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset('vendor_landing/img/speakers/2.jpg')}}" alt="Speaker 2" class="img-fluid">
                <div class="details">
                  <h3><a href="speaker-details.html">Hubert Hirthe</a></h3>
                  <p>Consequuntur odio aut</p>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset('vendor_landing/img/speakers/3.jpg')}}" alt="Speaker 3" class="img-fluid">
                <div class="details">
                  <h3><a href="speaker-details.html">Cole Emmerich</a></h3>
                  <p>Fugiat laborum et</p>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset('vendor_landing/img/speakers/4.jpg')}}" alt="Speaker 4" class="img-fluid">
                <div class="details">
                  <h3><a href="speaker-details.html">Jack Christiansen</a></h3>
                  <p>Debitis iure vero</p>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset('vendor_landing/img/speakers/5.jpg')}}" alt="Speaker 5" class="img-fluid">
                <div class="details">
                  <h3><a href="speaker-details.html">Alejandrin Littel</a></h3>
                  <p>Qui molestiae natus</p>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset('vendor_landing/img/speakers/6.jpg')}}" alt="Speaker 6" class="img-fluid">
                <div class="details">
                  <h3><a href="speaker-details.html">Willow Trantow</a></h3>
                  <p>Non autem dicta</p>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
      </section><!-- End Speakers Section -->

  </main><!-- End #main -->
  @stop