<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $skip = (int) ($request->skip ?? 0);
        $take = (int) ($request->take ?? 10);

        $total = Event::count();

        if ($total > 0) {
            $eventList = Event::query()
                ->select([
                    'id',
                    'date',
                    $this->localizedField('title'),
                    $this->localizedField('location'),
                ])
                ->skip($skip)
                ->take($take)
                ->get();

            $eventList->each(function ($event) {
                $event->image = route('events.streamImage', $event->id);
            });
        }

        return response()->json([
            'total' => $total,
            'skip'  => $skip,
            'take'  => $take,
            'data'  => $total ? $eventList : [],
        ]);
    }

    public function show($id)
    {
        $event = Event::query()
            ->select([
                'id',
                'date',
                $this->localizedField('title'),
                $this->localizedField('description'),
                $this->localizedField('location'),
            ])
            ->find($id);

        if($event) {
            $event->age = $this->localizedAge($event->age);
            $event->incident_date = $this->localizedDate($event->incident_date);
            $event->image = route('events.streamImage', $event->id);
        }

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
