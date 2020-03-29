@extends('Shared.Layouts.MasterLandingPage')

@section('header')
<header id="header" class="header-fixed">
@stop

@section('content')
<main id="main" class="main-page">
    <!-- ======= Hotels Section ======= -->
    <section id="hotels" class="section-with-bg wow fadeInUp">

        <div class="container">
          <div class="section-header">
            <h2>Berita</h2>
            <p>Berita Terbaru Seputar KendariEvent</p>
          </div>
  
          <div class="row">
            @if( count( $news ) == 0 )
            <div class="text-center">
              <h3>Tidak ada Event yang akan dilaksanakan.</h3>
            </div>
            @else
              @foreach ( $news as $item )
              <div class="col-lg-4 col-md-6">
                <div class="hotel">
                  <div class="hotel-img">
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