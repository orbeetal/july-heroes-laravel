<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return
        $incidents = Incident::query()
            // ->latest()
            ->paginate(18);

        return view("admin.incidents.index", compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $incident = new Incident();

        return view("admin.incidents.create", compact('incident'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        $incident = Incident::create(
            $this->getValidatedData($request)
        );

        return to_route('dashboard.incidents.show', $incident->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Incident $incident)
    {
        return to_route('dashboard.incidents.index', [
            'incident' => $incident->id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incident $incident)
    {
        return view("admin.incidents.edit", compact('incident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incident $incident)
    {
        $incident->update(
            $this->getValidatedData($request, $incident->id)
        );

        return to_route('dashboard.incidents.show', $incident->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incident $incident)
    {
        //
    }

    protected function getValidatedData($request, $id = '')
    {
        return $request->validate([
            "title_bn" => "required|string",
            "title_en" => "nullable|string",
            "description_bn" => "required|string",
            "description_en" => "nullable|string",
        ]);
    }
}
