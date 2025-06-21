<?php

namespace App\Models;

use App\Traits\HasHistories;
use App\Traits\Scopes\ScopeSearchFilterLocalizedFilter;
use Illuminate\Database\Eloquent\Model;

class Injured extends Model
{
    use HasHistories, ScopeSearchFilterLocalizedFilter;

    const SEARCH_ABLE_FIELDS = [
        'name_bn',
        'name_en',
        'occupation_bn',
        'occupation_en',
        'institution_bn',
        'institution_en',
    ];

    protected $guarded = [];
}
