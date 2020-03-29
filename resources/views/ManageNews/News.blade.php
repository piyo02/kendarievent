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
                <!-- <a href="#" data-modal-id="CreateEvent" data-href="{{route('showCreateEvent', ['organiser_id' => @$organiser->id])}}" class="btn btn-success loadModal"><i class="ico-plus"></i> @lang("News.create_news")</a> -->
                <a href="{{route('createOrganiserNews', ['organiser_id' => @$organiser->id])}}" class="btn btn-success"><i class="ico-plus"></i> @lang("News.create_news")</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        {!! Form::open(array('url' => route('showOrganiserNews', ['organiser_id'=>$organiser->id]), 'method' => 'get')) !!}
        <div class="input-group">
            <input name="q" value="{{$search['q'] or ''}}" placeholder="Search News.." type="text" class="form-control">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="ico-search"></i></button>
        </span>
        </div>
        <input type="hidden" name='sort_by' value="{{$search['sort_by']}}"/>
        {!! Form::close() !!}
    </div>
@stop

@section('content')

    @if($news->count())
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="order_options">
                    <span class="event_count">
                        @lang("News.num_news", ["num" => $organiser->news->count()])
                    </span>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 col-md-offset-7">
                <div class="order_options">
                    {!!Form::select('sort_by_select', [
                        'created_at' => trans("Controllers.sort.created_at"),
                        'title' => trans("Controllers.sort.news_title")

                        ], $search['sort_by'], ['class' => 'form-control pull right'])!!}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        @if($news->count())
            @foreach($news as $item)
                <div class="col-md-6 col-sm-6 col-xs-12">
                    @include('ManageNews.Partials.NewsPanel')
                </div>
            @endforeach
        @else
            @if($search['q'])
                @include('Shared.Partials.NoSearchResults')
            @else
                @include('ManageNews.Partials.NewsBlankSlate')
            @endif
        @endif
    </div>
@stop
