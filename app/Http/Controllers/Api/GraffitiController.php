<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Graffiti;
use Illuminate\Http\Request;

class GraffitiController extends Controller
{
    public function index(Request $request)
    {
        $skip = (int) ($request->skip ?? 0);
        $take = (int) ($request->take ?? 10);

        $total = Graffiti::count();

        if ($total > 0) {
            $graffitiList = Graffiti::query()
                ->select([
                    'id',
                    $this->localizedField('title'),
                    $this->localizedField('location'),
                ])
                ->skip($skip)
                ->take($take)
                ->get();

            $graffitiList->each(function ($graffiti) {
                $graffiti->image = route('graffiti.streamImage', $graffiti->id);
            });
        }

        return response()->json([
            'total' => $total,
            'skip'  => $skip,
            'take'  => $take,
            'data'  => $total ? $graffitiList : [],
        ]);
    }

    public function show($id)
    {
        $graffiti = Graffiti::query()
            ->select([
                'id',
                $this->localizedField('title'),
                $this->localizedField('details'),
                $this->localizedField('plots'),
                $this->localizedField('location'),
            ])
            ->find($id);

        if($graffiti) {
            $graffiti->age = $this->localizedAge($graffiti->age);
            $graffiti->incident_date = $this->localizedDate($graffiti->incident_date);
            $graffiti->image = route('graffiti.streamImage', $graffiti->id);
        }

        return response()->json($graffiti);
    }

    public function streamImage($id)
    {
        $graffiti = Graffiti::select('image')->findOrFail($id);

        $imageData = $this->getImageData($graffiti->image);
        
        return $imageData
            ? response($imageData)->header('Content-Type', 'image/jpeg')
            : abort(404);
    }
}
