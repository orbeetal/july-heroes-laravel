<?php

namespace App\Traits\Scopes;

trait ScopeFilter
{
    public function scopeFilter($query, $column, $value):void
    {
        $query->when($value, function ($query) use ($column, $value) {
            $query->where($column, $value); 
        });
    }
}