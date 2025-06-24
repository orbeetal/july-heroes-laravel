<?php

namespace App\Traits\Scopes;

trait ScopeFilter
{
    public function scopeFilter($query, $column, $value):void
    {
        if (is_null($value) || $value === '' || $value === []) {
            return;
        }

        $values = is_array($value) ? $value : explode(',', $value);

        $query->whereIn($column, $values);
    }
}