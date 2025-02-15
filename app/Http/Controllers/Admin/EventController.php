<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return
        $events = Event::query()
            // ->latest()
            ->paginate(18);

        return view("admin.events.index", compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = new Event();

        return view("admin.events.create", compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $event = Event::create(
            $this->getValidatedData($request)
        );

        return to_route('dashboard.events.show', $event->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return to_route('dashboard.events.index', [
            'event' => $event->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view("admin.events.edit", compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->update(
            $this->getValidatedData($request, $event->id)
        );

        return to_route('dashboard.events.show', $event->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }

    protected function getValidatedData($request, $id = '')
    {
        return $request->validate([
            "title_bn" => "required|string",
            "title_en" => "nullable|string",
            "body_bn" => "required|string",
            "body_en" => "nullable|string",
        ]);
    }
}
