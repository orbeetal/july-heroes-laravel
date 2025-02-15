<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Martyr;
use Illuminate\Http\Request;

class MartyrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $martyrs = Martyr::query()
            ->paginate();

        return view("admin.martyrs.index", compact('martyrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $martyr = new Martyr();

        return view("admin.martyrs.create", compact('martyr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $martyr = Martyr::create(
            $this->getValidatedData($request)
        );

        return to_route('dashboard.martyrs.show', $martyr->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Martyr $martyr)
    {
        return to_route('dashboard.martyrs.index', [
            'martyr' => $martyr->id,
        ]);

        return view("admin.martyrs.show", compact('martyr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Martyr $martyr)
    {
        return view("admin.martyrs.edit", compact('martyr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Martyr $martyr)
    {
        $martyr->update(
            $this->getValidatedData($request, $martyr->id)
        );

        return to_route('dashboard.martyrs.show', $martyr->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Martyr $martyr)
    {
        $martyr->delete();

        return to_route('dashboard.martyrs.index');
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
