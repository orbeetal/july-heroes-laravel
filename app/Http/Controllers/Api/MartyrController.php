<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Martyr;
use Illuminate\Http\Request;

class MartyrController extends Controller
{
    public function index(Request $request)
    {
        $skip = (int) ($request->skip ?? 0);
        $take = (int) ($request->take ?? 10);

        $total = Martyr::count();

        if ($total > 0) {
            $martyrs = Martyr::query()
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

            $martyrs->each(function ($martyr) {
                $martyr->incident_date = $this->localizedDate($martyr->incident_date);
            });
        }

        return response()->json([
            'total' => $total,
            'skip'  => $skip,
            'take'  => $take,
            'data'  => $total ? $martyrs : [],
        ]);
    }

    public function show($id)
    {
        $martyr = Martyr::query()
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

        if($martyr) {
            $martyr->age = $this->localizedAge($martyr->age);
            $martyr->incident_date = $this->localizedDate($martyr->incident_date);
        }

        return response()->json($martyr);
    }
}
