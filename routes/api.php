<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\GraffitiController;
use App\Http\Controllers\Api\IncidentController;
use App\Http\Controllers\Api\InjuredController;
use App\Http\Controllers\Api\MartyrController;
use App\Http\Controllers\Api\MurdererController;
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
            if(
                Str::startsWith($route->uri, 'api/v1/')
                && !Str::endsWith($route->getName(), '.streamImage')
            ) {
                $formattedUri = preg_replace('/\{(\w+)\}/', ':$1', $route->uri);

                $formattedUriWithDefault = preg_replace('/\{(\w+)\}/', '1', $route->uri);

                $endpoint = [
                    'method' => $route->methods[0],
                    "endpoint" => "/" . $formattedUri,
                    'examples' => [
                        "bn" => url($formattedUriWithDefault) . "?lang=bn",
                        "en" => url($formattedUriWithDefault) . "?lang=en",
                    ],
                ];

                if(in_array($formattedUri, ['api/v1/martyrs', 'api/v1/injured', 'api/v1/murderers']))
                {
                    $placeholder = $formattedUri === 'api/v1/murderers'
                        ? 'Search by name or occupation or organization'
                        : 'Search by name or occupation or institution';

                    $endpoint["search"] = [
                        'query' => 'search',
                        'type' => 'string',
                        'placeholder' => $placeholder,
                        'url' => url($formattedUriWithDefault) . '?search=text',
                    ];

                    $endpoint["filters"] = [
                        'data' => [
                            'bn' => url($formattedUriWithDefault) . '/filters?lang=bn',
                            'en' => url($formattedUriWithDefault) . '/filters?lang=en',
                        ],
                        'query' => 'filter item',
                        'type' => 'string',
                        'example' => [
                            'query' => 'occupations',
                            'type' => 'string',
                            'placeholder' => 'Filter by occupation',
                            'url' => url($formattedUriWithDefault) . '?occupations=teacher,student',
                        ],
                    ];
                }
                
                $endpoints[] = $endpoint;
            }
        }

        return response()->json([
            'endpoints' => $endpoints,
        ]);
    });

    Route::get('/martyrs/filters', [MartyrController::class, 'filters']);
    Route::get('/martyrs', [MartyrController::class, 'index']);
    Route::get('/martyrs/{martyr}', [MartyrController::class, 'show']);
    Route::get('/martyrs/{id}/image.webp', [MartyrController::class, 'streamImage'])
        ->name('martyrs.streamImage');

    Route::get('/injured/filters', [InjuredController::class, 'filters']);
    Route::get('/injured', [InjuredController::class, 'index']);
    Route::get('/injured/{injured}', [InjuredController::class, 'show']);
    Route::get('/injured/{id}/image.webp', [InjuredController::class, 'streamImage'])
        ->name('injured.streamImage');

    Route::get('/murderers/filters', [MurdererController::class, 'filters']);
    Route::get('/murderers', [MurdererController::class, 'index']);
    Route::get('/murderers/{murderer}', [MurdererController::class, 'show']);
    Route::get('/murderers/{id}/image.webp', [MurdererController::class, 'streamImage'])
        ->name('murderers.streamImage');

    Route::get('/graffiti', [GraffitiController::class, 'index']);
    Route::get('/graffiti/{graffiti}', [GraffitiController::class, 'show']);
    Route::get('/graffiti/{id}/image.webp', [GraffitiController::class, 'streamImage'])
        ->name('graffiti.streamImage');

    Route::get('/incidents', [IncidentController::class, 'index']);
    Route::get('/incidents/{incident}', [IncidentController::class, 'show']);

    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{event}', [EventController::class, 'show']);
    Route::get('/events/{id}/image.webp', [EventController::class, 'streamImage'])
        ->name('events.streamImage');

    Route::get('/page/home/banners', [BannerController::class, 'home']);
    Route::get('/page/martyrs/banners', [BannerController::class, 'martyrs']);
    Route::get('/page/injured/banners', [BannerController::class, 'injured']);
    Route::get('/page/murderers/banners', [BannerController::class, 'murderers']);
    Route::get('/banners/{id}/image.webp', [BannerController::class, 'streamImage'])
        ->name('banners.streamImage');

    Route::get('/settings', [SettingController::class, 'index']);
});