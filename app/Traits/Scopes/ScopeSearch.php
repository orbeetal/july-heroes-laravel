<?php

namespace App\Traits\Scopes;

trait ScopeSearch
{
    public function scopeSearch($query, $search): void
    {
        if (is_null($search) || $search === '') {
            return;
        }

        $modelClass = get_class($query->getModel());

        $fields = defined("$modelClass::SEARCH_ABLE_FIELDS")
            ? $modelClass::SEARCH_ABLE_FIELDS
            : [];

        $query->where(function ($query) use ($fields, $search) {
            foreach ($fields as $field) {
                $query->orWhere($field, 'like', '%' . $search . '%');
            }
        });
    }
}