<?php

namespace App\Traits\Scopes;

trait ScopeLocalizedFilter
{
    public function scopeLocalizedFilter($query, $property, $value, $lang = null):void
    {
        $query->when($value, function ($query) use ($property, $value, $lang) {
            if($lang) {
                $query->where("{$property}_{$lang}", $value);
            } else {
                $query->where(function ($query) use ($property, $value) {
                    $query->where("{$property}_bn", $value)
                        ->orWhere("{$property}_en", $value);
                });
            }
        });
    }
}