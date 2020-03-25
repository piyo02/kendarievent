@extends('Shared.Layouts.MasterLandingPage')

@section('header')
<header id="header" class="header-fixed">
@stop

@section('content')
<main id="main" class="main-page">
    <input type="hidden" id="menu" value="news">

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
                  <img src="{{ asset('vendor_landing/img/hotels/1.jpg') }}" alt="Hotel 1" class="img-fluid">
                </div>
                <h3><a href="single-post.html">Judul Berita</a></h3>
                <p>Preview Berita</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <div class="hotel">
                <div class="hotel-img">
                  <img src="{{ asset('vendor_landing/img/hotels/2.jpg') }}" alt="Hotel 2" class="img-fluid">
                </div>
                <h3><a href="single-post.html">Hotel 2</a></h3>
                <p>0.5 Mile from the Venue</p>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6">
              <div class="hotel">
                <div class="hotel-img">
                  <img src="{{ asset('vendor_landing/img/hotels/3.jpg') }}" alt="Hotel 3" class="img-fluid">
                </div>
                <h3><a href="single-post.html">Hotel 3</a></h3>
                <p>0.6 Mile from the Venue</p>
              </div>
            </div>
  
          </div>
        </div>
  
    </section><!-- End Hotels Section -->

  </main><!-- End #main -->
  @stop