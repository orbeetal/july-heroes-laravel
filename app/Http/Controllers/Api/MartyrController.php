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
            $lang = $this->getLang($request);

            $martyrs = Martyr::query()
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

            $martyrs->each(function ($martyr) {
                $martyr->incident_date = $this->localizedDate($martyr->incident_date);
                $martyr->image = route('martyrs.streamImage', $martyr->id);
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
            $martyr->image = route('martyrs.streamImage', $martyr->id);
        }

        return response()->json($martyr);
    }

    public function filters()
    {
        $occupations = Martyr::distinct()->pluck($this->localizedField('occupation'));
        $institutions = Martyr::distinct()->pluck($this->localizedField('institution'));

        return response()->json([
            'occupation' => $occupations->filter(fn($value) => !is_null($value) && $value !== ''),
            'institution' => $institutions->filter(fn($value) => !is_null($value) && $value !== ''),
        ]);
    }

    public function streamImage($id)
    {
        $martyr = Martyr::select('image')->findOrFail($id);

        $imageData = $this->getImageData($martyr->image);
        
        return $imageData
            ? response($imageData)->header('Content-Type', 'image/webp')
            : abort(404);
    }
}
