<?php

namespace App\Http\Controllers;

use App\Models\Organiser;
use Illuminate\Filesystem\Filesystem;
use App\Models\News;
use App\Models\Event;
use Image;
use Auth;
use Illuminate\Http\Request;
use View;

class OrganiserNewsController extends MyBaseController
{
    /**
     * Show the organiser news page
     *
     * @param Request $request
     * @param $organiser_id
     * @return mixed
     */
    public function showNews(Request $request, $organiser_id)
    {
        $organiser = Organiser::scope()->findOrfail($organiser_id);

        $allowed_sorts = ['created_at', 'title'];

        $searchQuery = $request->get('q');
        $sort_by = (in_array($request->get('sort_by'), $allowed_sorts) ? $request->get('sort_by') : 'created_at');

        $news = $searchQuery
            ? News::scope()->where('title', 'like', '%' . $searchQuery . '%')->orderBy($sort_by,
                'desc')->where('organiser_id', '=', $organiser_id)->paginate(12)
            : News::scope()->where('organiser_id', '=', $organiser_id)->orderBy($sort_by, 'desc')->paginate(12);
        // dd( $news );

        $data = [
            'news'    => $news,
            'organiser' => $organiser,
            'search'    => [
                'q'        => $searchQuery ? $searchQuery : '',
                'sort_by'  => $request->get('sort_by') ? $request->get('sort_by') : '',
                'showPast' => $request->get('past'),
            ],
        ];

        return view('ManageNews.News', $data);
    }

    public function createNews(Request $request, $organiser_id)
    {
        $organiser = Organiser::scope()->findOrfail($organiser_id);

        $data = [
            'organiser' => $organiser,
            'organiser_id' => $organiser_id,
        ];

        return view('ManageNews.CreateNews', $data);
    }

    public function postCreateNews(Request $request)
    {
        $organiser_id = $request->get('organiser_id');
        $news = News::createNew(false, false, true);
        
        // validate
        if (!$news->validate($request->all())) {
            return response()->json([
                'status' => 'error',
                'messages' => $news->errors()
            ]);
        }

        // data post 
        $news->title = $request->get('title');
        $news->preview = $request->get('preview');
        $news->organiser_id = $organiser_id;
        $news->hit = 0;
        $news->account_id = Auth::user()->account->id;
        $news->date = date('Y-m-d');

        // upload image
        if ($request->hasFile('image')) {
            $news->uploadImage($request->file('image'));
        }

        // upload file html
        $path = public_path() . '/user_content/news/';
        $filename = 'News_' . time() . '.html';

        $content = $request->get('content');
        if( file_put_contents( $path.$filename, $content) )
        {
            $news->file_content = '/user_content/news/' . $filename;
        }
        else
        {
            $news->file_content = '/user_content/news/' . 'default.html';
        }

        // insert in db
        $news->save();

        session()->flash('message', trans("Controllers.successfully_created_news"));

        return response()->json([
            'status'      => 'success',
            'message'     => trans("Controllers.refreshing"),
            'redirectUrl' => route('showOrganiserNews', [
                'organiser_id' => $organiser_id,
            ]),
        ]);
    }

    public function editNews(Request $request, $news_id)
    {
        $news = News::scope()->findOrfail($news_id);
        $organiser = Organiser::scope()->findOrfail($news->organiser_id);

        $file_content = file_get_contents(public_path($news->file_content));

        $data = [
            'organiser' => $organiser,
            'organiser_id' => $organiser->id,
            'news' => $news,
            'file_content' => $file_content
        ];

        return view('ManageNews.EditNews', $data);
    }

    public function postEditNews(Request $request, $news_id)
    {
        $organiser_id = $request->get('organiser_id');
        $news = News::scope()->findOrFail($news_id);

        $image_old = $news->image;
        $content_old = $news->file_content;
        // validate
        if (!$news->validate($request->all())) {
            return response()->json([
                'status' => 'error',
                'messages' => $news->errors()
            ]);
        }

        // data post 
        $news->title = $request->get('title');
        $news->preview = $request->get('preview');

        // upload image
        if ($request->hasFile('image')) {
            $news->uploadImage($request->file('image'));

            // delete image old
            @unlink( public_path($image_old) );
        }

        // upload file html
        $path = public_path() . '/user_content/news/';
        $filename = 'News_' . time() . '.html';

        $content = $request->get('content');
        if( file_put_contents( $path.$filename, $content) )
        {
            $news->file_content = '/user_content/news/' . $filename;
            @unlink( public_path($content_old) );
        }

        // insert in db
        $news->save();

        session()->flash('message', trans("Controllers.successfully_updated_news"));

        return response()->json([
            'status'      => 'success',
            'message'     => trans("Controllers.refreshing"),
            'redirectUrl' => route('showOrganiserNews', [
                'organiser_id' => $organiser_id,
            ]),
        ]);
    }

    public function postDeleteNews(Request $request)
    {
        $timestamp = date('Y-m-d H-m-s');
        News::where('id', $request->news_id)->update(['deleted_at' => $timestamp]);
        return redirect()->route('showOrganiserNews', ['organiser_id' => $request->organiser_id]);
    }
}
