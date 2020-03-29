<div role="dialog" id="DeleteNews_{{$item->id}}" class="modal fade" style="display: none;">

    @include('ManageOrganiser.Partials.EventCreateAndEditJS');

    {!! Form::open(array('url' => route('postDeleteNews', ['news_id' => $item->id]))) !!}
    @method('delete')
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">
                    <i class="ico-calendar"></i>
                    @lang("News.delete?")</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" value="{{$item->id}}" name="news_id">
                        <input type="hidden" value="{{$item->organiser_id}}" name="organiser_id">
                        <p>Are you sure want to delete this news?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <span class="uploadProgress"></span>
                {!! Form::button(trans("basic.cancel"), ['class'=>"btn modal-close btn-danger",'data-dismiss'=>'modal']) !!}
                {!! Form::submit(trans("News.delete_news"), ['class'=>"btn btn-success"]) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
