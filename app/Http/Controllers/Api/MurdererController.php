<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Murderer;
use Illuminate\Http\Request;

class MurdererController extends Controller
{
    public function index(Request $request)
    {
        $skip = (int) ($request->skip ?? 0);
        $take = (int) ($request->take ?? 10);

        $total = Murderer::count();

        if ($total > 0) {
            $murderers = Murderer::query()
                ->select([
                    'id',
                    $this->localizedField('name'),
                    $this->localizedField('occupation'),
                    $this->localizedField('organization'),
                    $this->localizedField('designation'),
                ])
                ->skip($skip)
                ->take($take)
                ->get();

            $murderers->each(function ($murderer) {
                $murderer->image = route('murderers.streamImage', $murderer->id);
            });
        }

        return response()->json([
            'total' => $total,
            'skip'  => $skip,
            'take'  => $take,
            'data'  => $total ? $murderers : [],
        ]);
    }

    public function show($id)
    {
        $murderer = Murderer::query()
            ->select([
                'id',
                $this->localizedField('name'),
                'age',
                $this->localizedField('biography'),
                $this->localizedField('address'),
                $this->localizedField('occupation'),
                $this->localizedField('organization'),
                $this->localizedField('designation'),
                $this->localizedField('incident_details'),
            ])
            ->find($id);

        if($murderer) {
            $murderer->age = $this->localizedAge($murderer->age);
            $murderer->image = route('murderers.streamImage', $murderer->id);
        }

        return response()->json($murderer);
    }

    public function streamImage($id)
    {
        $murderer = Murderer::select('image')->findOrFail($id);

        $imageData = $this->getImageData($murderer->image);
        
        return $imageData
            ? response($imageData)->header('Content-Type', 'image/webp')
            : abort(404);
    }
}
