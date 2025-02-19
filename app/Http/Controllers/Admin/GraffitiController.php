<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Graffiti;
use Illuminate\Http\Request;

class GraffitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $graffitis = Graffiti::query()
            ->paginate();

        return view("admin.graffiti.index", compact('graffitis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $graffiti = new Graffiti();

        return view("admin.graffiti.create", compact('graffiti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $graffiti = Graffiti::create(
            $this->getValidatedData($request)
            + $this->getPhotoData($request, 800, 450)
        );

        return to_route('dashboard.graffiti.show', $graffiti->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Graffiti $graffiti)
    {
        return to_route('dashboard.graffiti.index', [
            'graffiti' => $graffiti->id,
        ]);

        return view("admin.graffiti.show", compact('graffiti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graffiti $graffiti)
    {
        return view("admin.graffiti.edit", compact('graffiti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Graffiti $graffiti)
    {
        $graffiti->update(
            $this->getValidatedData($request, $graffiti->id)
            + $this->getPhotoData($request, 800, 450)
        );

        return to_route('dashboard.graffiti.show', $graffiti->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Graffiti $graffiti)
    {
        $graffiti->delete();

        return to_route('dashboard.graffiti.index');
    }

    protected function getValidatedData($request, $id = '')
    {
        return $request->validate([
            "title_bn" => "required|string",
            "title_en" => "nullable|string",
            "details_bn" => "nullable|string",
            "details_en" => "nullable|string",
            "plots_bn" => "nullable|string",
            "plots_en" => "nullable|string",
            "location_bn" => "nullable|string",
            "location_en" => "nullable|string",
        ]);
    }
}
