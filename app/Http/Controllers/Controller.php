<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        return DB::raw("COALESCE({$field}_{$lang}, {$field}_bn, '') as {$field}");
    }

    protected function localizedDate($date = null, $lang = null): string
    {
        if (!$date) {
            return '';
        }

        $lang = $lang ?? $this->getLang();

        $carbonDate = Carbon::parse($date);

        $formattedDate = $lang === 'bn'
            ? $carbonDate->locale('bn')->translatedFormat('d F Y')
            : $carbonDate->translatedFormat('d F Y');

        return $this->localizedNumberInText($formattedDate, $lang);
    }

    protected function localizedNumberInText($text = null, $lang = null): string
    {
        if (!$text) {
            return '';
        }
    
        $lang = $lang ?? $this->getLang();
    
        // Bengali language localization
        if ($lang === 'bn') {
            // Bengali digits map
            $bnDigits = [
                '0' => '০', '1' => '১', '2' => '২', '3' => '৩', '4' => '৪',
                '5' => '৫', '6' => '৬', '7' => '৭', '8' => '৮', '9' => '৯'
            ];
    
            // Use regex to replace each digit with Bengali digits
            return preg_replace_callback('/\d/', function ($matches) use ($bnDigits) {
                return $bnDigits[$matches[0]]; // Replace each digit with Bengali digit
            }, $text);
        }

        return (string) $text;
    }

    protected function localizedAge($age = null, $lang = null): string
    {
        if (!$age) {
            return '';
        }

        return $this->localizedNumberInText($age) . ($this->getLang() == 'bn' ? " বছর" : " years");
    }

    protected function getImageData($image = null)
    {
        if ($image && strpos($image, 'data:image') === 0)
        {
            $base64String = preg_replace('/^data:image\/\w+;base64,/', '', $image);

            return base64_decode($base64String);
        }

        return null;
    }

}
