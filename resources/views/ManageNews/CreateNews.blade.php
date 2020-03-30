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

    @include('ManageNews.Partials.EventCreateAndEditJS')

    <div class="row">
    {!! Form::open(array('url' => route('postCreateNews'), 'class' => 'ajax gf' )) !!}
        <input type="hidden" name="organiser_id" value="{{$organiser_id}}">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('title', trans("News.news_title"), array('class'=>'control-label required')) !!}
                {!!  Form::text('title', Input::old('title'),array('class'=>'form-control','placeholder'=>trans("News.news_title_placeholder", ["name"=>Auth::user()->first_name]) ))  !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', trans("News.news_image"), array('class'=>'control-label required')) !!}
                {!! Form::styledFile('image') !!}

            </div>
            <div class="form-group">
                {!! Form::label('preview', trans("News.news_preview"), array('class'=>'control-label required')) !!}
                {!!  Form::textarea('preview', Input::old('preview'),
                            array(
                            'class'=>'form-control',
                            'rows' => 5
                            ))  !!}
            </div>
            <div class="form-group custom-theme">
                {!! Form::label('content', trans("News.news_content"), array('class'=>'control-label required')) !!}
                {!!  Form::textarea('content', Input::old('content'),
                            array(
                            'class'=>'form-control',
                            'rows' => 10,
                            'id' => 'summernote'
                            ))  !!}
            </div>
            <div class="form-group">
                <span class="uploadProgress"></span>
                {!! Form::submit(trans("News.create_news"), ['class'=>"btn btn-success"]) !!}
            </div>

            @if($organiser_id)
                {!! Form::hidden('organiser_id', $organiser_id) !!}
            @else
                <div class="create_organiser" style="{{$organisers->isEmpty() ? '' : 'display:none;'}}">
                    <h5>
                        @lang("Organiser.organiser_details")
                    </h5>

                    <div class="form-group">
                        {!! Form::label('organiser_name', trans("Organiser.organiser_name"), array('class'=>'required control-label ')) !!}
                        {!!  Form::text('organiser_name', Input::old('organiser_name'),
                                    array(
                                    'class'=>'form-control',
                                    'placeholder'=>trans("Organiser.organiser_name_placeholder")
                                    ))  !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('organiser_email', trans("Organiser.organiser_email"), array('class'=>'control-label required')) !!}
                        {!!  Form::text('organiser_email', Input::old('organiser_email'),
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder'=>trans("Organiser.organiser_email_placeholder")
                                    ))  !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('organiser_about', trans("Organiser.organiser_description"), array('class'=>'control-label ')) !!}
                        {!!  Form::textarea('organiser_about', Input::old('organiser_about'),
                                    array(
                                    'class'=>'form-control editable2',
                                    'placeholder'=>trans("Organiser.organiser_description_placeholder"),
                                    'rows' => 4
                                    ))  !!}
                    </div>
                    <div class="form-group more-options">
                        {!! Form::label('organiser_logo', trans("Organiser.organiser_logo"), array('class'=>'control-label ')) !!}
                        {!! Form::styledFile('organiser_logo') !!}
                    </div>
                    <div class="row more-options">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('organiser_facebook', trans("Organiser.organiser_facebook"), array('class'=>'control-label ')) !!}
                                {!!  Form::text('organiser_facebook', Input::old('organiser_facebook'),
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder'=>trans("Organiser.organiser_facebook_placeholder")
                                    ))  !!}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('organiser_twitter', trans("Organiser.organiser_twitter"), array('class'=>'control-label ')) !!}
                                {!!  Form::text('organiser_twitter', Input::old('organiser_twitter'),
                                    array(
                                    'class'=>'form-control ',
                                    'placeholder'=>trans("Organiser.organiser_twitter_placeholder")
                                    ))  !!}

                            </div>
                        </div>
                    </div>

                    <a data-show-less-text="@lang("Organiser.hide_additional_organiser_options")" href="javascript:void(0);"
                        class="in-form-link show-more-options">
                        @lang("Organiser.additional_organiser_options")
                    </a>
                </div>

                @if(!$organisers->isEmpty())
                    <div class="form-group select_organiser" style="{{$organisers ? '' : 'display:none;'}}">

                        {!! Form::label('organiser_id', trans("Organiser.select_organiser"), array('class'=>'control-label ')) !!}
                        {!! Form::select('organiser_id', $organisers, $organiser_id, ['class' => 'form-control']) !!}

                    </div>
                    <span class="">
                        @lang("Organiser.or") <a data-toggle-class=".select_organiser, .create_organiser"
                            data-show-less-text="<b>@lang("Organiser.select_an_organiser")</b>" href="javascript:void(0);"
                            class="in-form-link show-more-options">
                            <b>@lang("Organiser.create_an_organiser")</b>
                        </a>
                    </span>
                @endif
            @endif
        </div>
    {!! Form::close() !!}
    </div>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 120
            });
        });
    </script>
@stop
