@extends('Shared.Layouts.BlankSlate')

@section('blankslate-icon-class')
    ico-ticket
@stop

@section('blankslate-title')
    @lang("News.no_news_yet")
@stop

@section('blankslate-text')
    @lang("News.no_news_yet_text")
@stop

@section('blankslate-body')
<button data-invoke="modal" data-modal-id="CreateEvent" data-href="{{route('showCreateEvent', ['organiser_id' => $organiser->id])}}" href='javascript:void(0);'  class="btn btn-success mt5 btn-lg" type="button">
    <i class="ico-ticket"></i>
    @lang("News.create_news")
</button>
@stop


