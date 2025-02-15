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
            ->select([
                'id',
                $this->localizedField('title'),
                $this->localizedField('description'),
            ])
            ->get();

        return response()->json($events);
    }

    public function show($id)
    {
        $event = Event::query()
            ->select([
                'id',
                $this->localizedField('title'),
                $this->localizedField('description'),
            ])
            ->find($id);

        return response()->json($event);
    }
}
