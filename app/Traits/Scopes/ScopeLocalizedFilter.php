<?php

namespace App\Traits\Scopes;

trait ScopeLocalizedFilter
{
    public function scopeLocalizedFilter($query, $property, $value, $lang = null): void
    {
        if (is_null($value) || $value === '' || $value === []) {
            return;
        }

        $values = is_array($value) ? $value : explode(',', $value);

        if ($lang) {
            $query->whereIn("{$property}_{$lang}", $values);
        } else {
            $query->where(function ($query) use ($property, $values) {
                $query->whereIn("{$property}_bn", $values)
                    ->orWhereIn("{$property}_en", $values);
            });
        }
    }
}