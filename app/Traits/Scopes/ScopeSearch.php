<?php

namespace App\Traits\Scopes;

trait ScopeSearch
{
    public function getSearchAbleFields()
    {
        return defined(static::class.'::SEARCH_ABLE_FIELDS')
            ? static::SEARCH_ABLE_FIELDS
            : [];
    }

    public function scopeSearch($query, $search):void
    {
        $query->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                foreach ($this->getSearchAbleFields() as $field) {
                    $query->orWhere($field, "like", "%{$search}%");
                }
            });
        });
    }
}