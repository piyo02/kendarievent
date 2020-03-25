@extends('Shared.Layouts.MasterLandingPage')

@section('header')
<header id="header">
@stop

@section('content')
<section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">The Annual<br><span>Marketing</span> Conference</h1>
      <p class="mb-4 pb-0">10-12 December, Downtown Conference Center, New York</p>
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
      <a href="#about" class="about-btn scrollto">About The Event</a>
    </div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Tentang Kendari Event</h2>
            <p>Sed nam ut dolor qui repellendus iusto odit. Possimus inventore eveniet accusamus error amet eius aut
              accusantium et. Non odit consequatur repudiandae sequi ea odio molestiae. Enim possimus sunt inventore in
              est ut optio sequi unde.</p>
          </div>
          <div class="col-lg-3">
            <h3>Where</h3>
            <p>Downtown Conference Center, New York</p>
          </div>
          <div class="col-lg-3">
            <h3>When</h3>
            <p>Monday to Wednesday<br>10-12 December</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Event</h2>
          <p>Upcoming Events</p>
        </div>

        <div class="row">
          @if( count( $events ) == 0 )
          <div class="text-center">
            <h3>Tidak ada Event yang akan dilaksanakan.</h3>
          </div>
          @else
          
            @foreach ( $events as $event )
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset( $event->bg_image_path )}}" alt="Speaker 1" class="img-fluid">
                <div class="details">
                  <h3><a href="{{ $event->event_url }}">{{ $event->title }}</a></h3>
                  <p>{{ $event->venue_name }}</p>
                  <div class="social">
                    <p>{{ $event->start_date }}</p>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          
          @endif
        </div>
      </div>

    </section><!-- End Speakers Section -->

    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Berita</h2>
          <p>Berita Terbaru Seputar KendariEvent</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{asset('vendor_landing/img/hotels/1.jpg')}}" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Judul Berita</a></h3>
              <p>Preview Berita</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{asset('vendor_landing/img/hotels/2.jpg')}}" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 2</a></h3>
              <p>0.5 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="{{asset('vendor_landing/img/hotels/3.jpg')}}" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>

        </div>
      </div>

    </section><!-- End Hotels Section -->

  </main><!-- End #main -->
@stop
