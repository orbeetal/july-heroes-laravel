<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::query()
            ->get([
                'id',
                'title',
                'body',
            ]);

        return response()->json($events);
    }

    public function show(Event $event)
    {
        return response()->json([
            'id' => $event->id,
            'title' => $event->title,
            'body' => $event->body,
        ]);
    }
}
