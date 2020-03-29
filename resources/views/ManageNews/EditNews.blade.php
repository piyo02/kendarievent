@extends('Shared.Layouts.Master')

@section('title')
    @parent
    @lang("Organiser.organiser_news")
@stop

@section('page_title')
    @lang("Organiser.organiser_name_news", ["name"=>$organiser->name])
@stop

@section('top_nav')
    @include('ManageNews.Partials.TopNav')
@stop

@section('head')
    {!! HTML::script('https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key='.env("GOOGLE_MAPS_GEOCODING_KEY")) !!}
    {!! HTML::script('vendor/geocomplete/jquery.geocomplete.min.js')!!}
@stop

@section('menu')
    @include('ManageNews.Partials.Sidebar')
@stop

@section('page_header')
    <div class="col-md-9">
        <div class="btn-toolbar">
            <div class="btn-group btn-group-responsive">
                <a href="{{route('showOrganiserNews', ['organiser_id' => @$organiser->id])}}" class="btn btn-success"><i class="ico-arrow-left"></i> Kembali</a>
            </div>
        </div>
    </div>
@stop

@section('content')

    @include('ManageOrganiser.Partials.EventCreateAndEditJS')

    <div class="row">
    {!! Form::open(array('url' => route('postEditNews', ['news_id' => $news->id]), 'class' => 'ajax gf' )) !!}
        <input type="hidden" name="organiser_id" value="{{$organiser_id}}">
        <input type="hidden" name="news_id" value="{{$news->id}}">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('title', trans("News.news_title"), array('class'=>'control-label required')) !!}
                {!!  Form::text('title', $news->title,array('class'=>'form-control','placeholder'=>trans("News.news_title_placeholder", ["name"=>Auth::user()->first_name]) ))  !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', trans("News.news_image"), array('class'=>'control-label required')) !!}
                {!! Form::styledFile('image') !!}

            </div>
            <div class="form-group">
                {!! Form::label('preview', trans("News.news_preview"), array('class'=>'control-label required')) !!}
                {!!  Form::textarea('preview', $news->preview,
                            array(
                            'class'=>'form-control',
                            'rows' => 5
                            ))  !!}
            </div>
            <div class="form-group custom-theme">
                {!! Form::label('content', trans("News.news_content"), array('class'=>'control-label required')) !!}
                {!!  Form::textarea('content', $file_content,
                            array(
                            'class'=>'form-control  editable',
                            'rows' => 5
                            ))  !!}
            </div>
            <div class="form-group">
                <span class="uploadProgress"></span>
                {!! Form::submit(trans("News.edit_news"), ['class'=>"btn btn-success"]) !!}
            </div>

            @if($organiser_id)
                {!! Form::hidden('organiser_id', $organiser_id) !!}
            @endif
        </div>
    {!! Form::close() !!}
    </div>
@stop
