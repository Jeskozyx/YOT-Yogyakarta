<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = Event::latest('tanggal_pelaksanaan');
        
        if ($request->has('all') && $request->all == 'true') {
            $events = $query->get();
        } else {
            $events = $query->take(6)->get();
        }

        return view('users.event', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('users.event_detail', compact('event'));
    }
}
