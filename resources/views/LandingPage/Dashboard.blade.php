@extends('Shared.Layouts.MasterLandingPage')

@section('header')
<header id="header">
@stop

@section('content')
<section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0"><span>Kendari</span> Event</h1>
      <p class="mb-4 pb-0">it's all about event!!!</p>
      <!-- <a href="#about" class="about-btn scrollto">About The Event</a> -->
    </div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Tentang Kendari Event</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro pariatur vero possimus nobis beatae voluptatibus adipisci cum nihil quas earum?</p>
          </div>
          <div class="col-lg-3">
            <h3>Lokasi</h3>
            <p>Lokasi KendariEvent</p>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Speakers Section ======= -->
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Event Terbaru</h2>
          <p>Event tebaru di KendariEvent</p>
        </div>

        <div class="row">
          @if( count( $upcoming_events ) == 0 )
          <div class="text-center">
            <h3>Tidak ada Event yang akan dilaksanakan.</h3>
          </div>
          @else
          
            @foreach ( $upcoming_events as $event )
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset( ($event->image_path) ? $event->image_path : 'user_content/event_images/default.jpg'   )}}" alt="Speaker 1" class="img-fluid">
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

    <!-- ======= Speakers Section ======= -->
    <section id="speakers" class="section-with-bg wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Event</h2>
          <p>Event yang sudah dilaksanakan KendariEvent</p>
        </div>

        <div class="row">
            @foreach ( $past_events as $event )
            <div class="col-lg-4 col-md-6">
              <div class="speaker">
                <img src="{{asset( ($event->image_path) ? $event->image_path : 'user_content/event_images/default.jpg' )}}" alt="Speaker 1" class="img-fluid">
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
        </div>
      </div>

    </section><!-- End Speakers Section -->

    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Berita</h2>
          <p>Berita Terbaru Seputar KendariEvent</p>
        </div>

        <div class="row">
        @if( count( $news ) == 0 )
          <div class="text-center">
            <h3>Tidak ada Berita terbaru.</h3>
          </div>
          @else

            @foreach ( $news as $item )
            <div class="col-lg-4 col-md-6">
              <div class="hotel">
                <div class="hotel-img text-center">
                  <img src="{{asset($item->image)}}" alt="{{$item->title}}" class="img-fluid">
                </div>
                <h3><a href="{{route('postNewsLandingPage', ['news_id' => $item->id])}}">{{$item->title}}</a></h3>
                <p>{{$item->preview}}</p>
              </div>
            </div>
            @endforeach
          @endif
        </div>
      </div>

    </section><!-- End Hotels Section -->

  </main><!-- End #main -->
@stop
