<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Murderer;
use Illuminate\Http\Request;

class MurdererController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murderers = Murderer::query()
            ->paginate();

        return view("admin.murderers.index", compact('murderers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $murderer = new Murderer();

        return view("admin.murderers.create", compact('murderer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $murderer = Murderer::create(
            $this->getValidatedData($request)
        );

        return to_route('dashboard.murderers.show', $murderer->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Murderer $murderer)
    {
        return to_route('dashboard.murderers.index', [
            'murderer' => $murderer->id,
        ]);

        return view("admin.murderers.show", compact('murderer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Murderer $murderer)
    {
        return view("admin.murderers.edit", compact('murderer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Murderer $murderer)
    {
        $murderer->update(
            $this->getValidatedData($request, $murderer->id)
        );

        return to_route('dashboard.murderers.show', $murderer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Murderer $murderer)
    {
        $murderer->delete();

        return to_route('dashboard.murderers.index');
    }

    protected function getValidatedData($request, $id = '')
    {
        return $request->validate([
            "name_bn" => "required|string",
            "name_en" => "nullable|string",
            "age" => "nullable|integer",
            "image" => "nullable|string",
            "biography_bn" => "nullable|string",
            "biography_en" => "nullable|string",
            "address_bn" => "nullable|string",
            "address_en" => "nullable|string",
            "incident_details_bn" => "nullable|string",
            "incident_details_en" => "nullable|string",
            "occupation_bn" => "nullable|string",
            "occupation_en" => "nullable|string",
            "organization_bn" => "nullable|string",
            "organization_en" => "nullable|string",
            "designation_bn" => "nullable|string",
            "designation_en" => "nullable|string",
        ]);
    }
}
