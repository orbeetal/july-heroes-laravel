<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

abstract class Controller
{
    public function getLang($request = null) {
        $lang = $request
            ? $request->lang
            : request()->lang;

        return in_array($lang, ['bn', 'en'])
            ? $lang 
            : 'bn';
    }

    public function localizedField($field, $lang = null)
    {
        $lang = $lang ?? $this->getLang();

        return DB::raw("COALESCE({$field}_{$lang}, {$field}_bn) as {$field}");
    }
}
