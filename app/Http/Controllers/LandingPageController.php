<?php

namespace App\Http\Controllers;

use App\Attendize\Utils;
use App\Models\Event;
use App\Models\EventStats;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Redirect;
use View;

class LandingPageController extends Controller
{
    /**
     * Shows Home Landing Page.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function showHome(  )
    {
        $events = Event::all();
        // $events = Event::scope()->where('end_date', '>=', Carbon::now())->get();
        // dd( $events );
        $data = [
            'events' => $events
        ];
        return view('LandingPage.Dashboard', $data);
    }

    public function showEvents(  )
    {
        $event = Event::all();
        // $event = $event->getEventUrlAttribute();
        // dd( $event );
        return view('LandingPage.Event');
    }

    public function showNews(  )
    {
        $event = Event::all();
        // $event = $event->getEventUrlAttribute();
        // dd( $event );
        return view('LandingPage.News');
    }
}