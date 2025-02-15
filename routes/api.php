<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\InjuredController;
use App\Http\Controllers\Api\MartyrController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::fallback(function (Request $request) {
    return response()->json([
        'message' => "Route not found: " . $request->path(),
    ], 404);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return [
        'php' => PHP_VERSION,
        'laravel' => app()->version()
    ];
});

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        $endpoints = [];

        foreach(Route::getRoutes() as $route) {
            $ignore_routes = [
                'product.photo.stream',
                'equipment.photo.stream',
            ];

            if(
                Str::startsWith($route->uri, 'api/v1/')
                && !in_array($route->getName(), $ignore_routes)
            ) {
                $formattedUri = preg_replace('/\{(\w+)\}/', ':$1', $route->uri);

                $formattedUriWithDefault = preg_replace('/\{(\w+)\}/', '1', $route->uri);

                $endpoints[] = [
                    'method' => $route->methods[0],
                    "endpoint" => "/" . $formattedUri,
                    'examples' => [
                        "bn" => url($formattedUriWithDefault) . "?lang=bn",
                        "en" => url($formattedUriWithDefault) . "?lang=en",
                    ],
                ];

            }
        }

        return response()->json([
            'endpoints' => $endpoints,
        ]);
    });

    Route::get('/martyrs', [MartyrController::class, 'index']);
    Route::get('/martyrs/{martyr}', [MartyrController::class, 'show']);

    Route::get('/injured', [InjuredController::class, 'index']);
    Route::get('/injured/{injured}', [InjuredController::class, 'show']);

    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{event}', [EventController::class, 'show']);

    Route::get('/settings', [SettingController::class, 'index']);
});