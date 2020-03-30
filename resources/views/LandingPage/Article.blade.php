@extends('Shared.Layouts.MasterLandingPage')

@section('header')
<header id="header" class="header-fixed">
@stop

@section('content')
  <main id="main" class="main-page">

    <!-- ======= Speaker Details Sectionn ======= -->
    <section id="speakers-details" class="wow fadeIn">
      <div class="container">
        <div class="section-header text-center">
          <h3>{{$news->title}}</h3>
        </div>

        <div class="row">
          <div class="col-md-9">
            <div class="text-center">
              <img src="{{asset($news->image)}}" alt="{{$news->title}}" class="img-fluid" width="100%">
            </div>
            <?php $content = file_get_contents(public_path($news->file_content)) ?>
            <?= $content ?>
          </div>

          <div class="col-md-3">
            <div class="details">
              <h2>Berita Terbaru</h2>
              @foreach ( $latest_news as $item )
                <div id="speakers" style="padding: 0px !important;">
                  <div class="speaker">
                      <img src="{{$item->image}}" alt="{{$item->title}}" class="img-fluid">
                      <div class="details">
                        <h6><a href="{{route('postNewsLandingPage', ['news_id' => $item->id])}}">{{$item->title}}</a></h6>
                        <br>
                      </div>
                  </div>
                </div>
              @endforeach
            </div>
            
          </div>

        </div>
      </div>

    </section>

  </main><!-- End #main -->
@stop
