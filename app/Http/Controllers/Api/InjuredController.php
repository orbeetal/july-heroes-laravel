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
            $lang = $this->getLang($request);

            $injuredList = Injured::query()
                ->select([
                    'id',
                    $this->localizedField('name', $lang),
                    $this->localizedField('occupation', $lang),
                    $this->localizedField('institution', $lang),
                    'incident_date',
                ])
                ->localizedFilter('occupation', $request->occupation, $lang)
                ->localizedFilter('institution', $request->institution, $lang)
                ->search($request->search)
                ->skip($skip)
                ->take($take)
                ->get();

            $injuredList->each(function ($injured) {
                $injured->incident_date = $this->localizedDate($injured->incident_date);
                $injured->image = route('injured.streamImage', $injured->id);
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
            $injured->image = route('injured.streamImage', $injured->id);
        }

        return response()->json($injured);
    }

    public function filters()
    {
        $occupations = Injured::distinct()->pluck($this->localizedField('occupation'));
        $institutions = Injured::distinct()->pluck($this->localizedField('institution'));

        return response()->json([
            'occupation' => $occupations->filter(fn($value) => !is_null($value) && $value !== ''),
            'institution' => $institutions->filter(fn($value) => !is_null($value) && $value !== ''),
        ]);
    }

    public function streamImage($id)
    {
        $injured = Injured::select('image')->findOrFail($id);

        $imageData = $this->getImageData($injured->image);
        
        return $imageData
            ? response($imageData)->header('Content-Type', 'image/webp')
            : abort(404);
    }
}
