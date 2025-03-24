<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::query()
            ->select([
                'id',
                $this->localizedField('title'),
                $this->localizedField('description'),
            ])
            ->get();

        return response()->json($incidents);
    }

    public function show($id)
    {
        $incident = Incident::query()
            ->select([
                'id',
                $this->localizedField('title'),
                $this->localizedField('description'),
            ])
            ->find($id);

        return response()->json($incident);
    }
}
