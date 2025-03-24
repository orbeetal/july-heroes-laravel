<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function home()
    {
        return $this->getBanners('home');
    }

    public function martyrs()
    {
        return $this->getBanners('martyrs');
    }

    public function injured()
    {
        return $this->getBanners('injured');
    }

    public function murderers()
    {
        return $this->getBanners('murderers');
    }

    public function getBanners($page)
    {
        $banners = Banner::query()
            ->select('id')
            ->where('status', 1)
            ->where('page', $page)
            ->orderBy('position')
            ->get();

        $banners->each(function ($banner) {
            $banner->image = route('banners.streamImage', $banner->id);
        });

        return response()->json($banners);
    }

    public function streamImage($id)
    {
        $banner = Banner::select('image')->findOrFail($id);

        $imageData = $this->getImageData($banner->image);
        
        return $imageData
            ? response($imageData)->header('Content-Type', 'image/webp')
            : abort(404);
    }
}
