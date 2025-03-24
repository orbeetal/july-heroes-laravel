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

    public function streamImage($id)
    {
        $event = Event::select('image')->findOrFail($id);

        $imageData = $this->getImageData($event->image);
        
        return $imageData
            ? response($imageData)->header('Content-Type', 'image/webp')
            : abort(404);
    }
}
