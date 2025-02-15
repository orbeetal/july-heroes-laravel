<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Injured;
use Illuminate\Http\Request;

class InjuredController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $injureds = Injured::query()
            ->paginate();

        return view("admin.injured.index", compact('injureds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $injured = new Injured();

        return view("admin.injured.create", compact('injured'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $injured = Injured::create(
            $this->getValidatedData($request)
        );

        return to_route('dashboard.injured.show', $injured->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Injured $injured)
    {
        return to_route('dashboard.injured.index', [
            'injured' => $injured->id,
        ]);

        return view("admin.injured.show", compact('injured'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Injured $injured)
    {
        return view("admin.injured.edit", compact('injured'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Injured $injured)
    {
        $injured->update(
            $this->getValidatedData($request, $injured->id)
        );

        return to_route('dashboard.injured.show', $injured->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Injured $injured)
    {
        $injured->delete();

        return to_route('dashboard.injured.index');
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
            "incident_date" => "nullable|date",
            "incident_bn" => "nullable|string",
            "incident_en" => "nullable|string",
            "occupation_bn" => "nullable|string",
            "occupation_en" => "nullable|string",
            "university_bn" => "nullable|string",
            "university_en" => "nullable|string",
            "department_bn" => "nullable|string",
            "department_en" => "nullable|string",
        ]);
    }
}
