<div class="panel panel-success event">
    <div class="panel-heading" data-style="background-color: {{{$item->bg_color}}};background-image: url({{{$item->bg_image_url}}}); background-size: cover;">
        <!-- <div class="event-date">
            a
        </div> -->
        <ul class="event-meta">
            <li class="event-title">
                <a title="{{{$item->title}}}" href="{{route('editNews', ['news_id'=>$item->id])}}">
                    {{{ str_limit($item->title, $limit = 75, $end = '...') }}}
                </a>
            </li>
            <li class="event-organiser">
                By <a href='{{route('showOrganiserDashboard', ['organiser_id' => $item->organiser->id])}}'>{{{$item->organiser->name}}}</a>
            </li>
        </ul>

    </div>

    <div class="panel-body">
        <ul class="nav nav-section nav-justified mt5 mb5">
            <li>
                <div class="section">
                    <img src="{{asset($item->image)}}" alt="{{{$item->title}}}" width="100%">
                </div>
            </li>
            <li>
                <div class="section">
                    <p>{{{$item->preview}}}</p>
                </div>
            </li>
        </ul>
    </div>
    <div class="panel-footer">
        <ul class="nav nav-section nav-justified">
            <li>
                <a href="{{route('editNews', ['news_id' => $item->id])}}">
                    <i class="ico-edit"></i> @lang("basic.edit")
                </a>
            </li>

            <li>
                <a href="#" data-target="#DeleteNews_{{$item->id}}" data-toggle="modal">
                    <i class="ico-remove"></i> Delete
                </a>

            @include('ManageNews.Modals.DeleteNews')
            </li>
        </ul>
    </div>
</div>