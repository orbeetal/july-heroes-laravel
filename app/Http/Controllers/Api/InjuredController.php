<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Injured;
use Illuminate\Http\Request;

class InjuredController extends Controller
{
    public function index(Request $request)
    {
        $skip = (int) ($request->skip ?? 0);
        $take = (int) ($request->take ?? 10);

        $total = Injured::count();

        if ($total > 0) {
            $injuredList = Injured::query()
                ->select([
                    'id',
                    $this->localizedField('name'),
                    $this->localizedField('occupation'),
                    $this->localizedField('institution'),
                    'incident_date',
                ])
                ->skip($skip)
                ->take($take)
                ->get();

            $injuredList->each(function ($injured) {
                $injured->incident_date = $this->localizedDate($injured->incident_date);
            });
        }

        return response()->json([
            'total' => $total,
            'skip'  => $skip,
            'take'  => $take,
            'data'  => $total ? $injuredList : [],
        ]);
    }

    public function show($id)
    {
        $injured = Injured::query()
            ->select([
                'id',
                $this->localizedField('name'),
                'age',
                $this->localizedField('biography'),
                $this->localizedField('address'),
                $this->localizedField('occupation'),
                $this->localizedField('institution'),
                $this->localizedField('department'),
                'incident_date',
                $this->localizedField('incident'),
            ])
            ->find($id);

        if($injured) {
            $injured->age = $this->localizedAge($injured->age);
            $injured->incident_date = $this->localizedDate($injured->incident_date);
        }

        return response()->json($injured);
    }
}
