<?php

namespace App\Models;

use App\Traits\HasHistories;
use App\Traits\Scopes\ScopeSearchFilterLocalizedFilter;
use Illuminate\Database\Eloquent\Model;

class Murderer extends Model
{
    use HasHistories, ScopeSearchFilterLocalizedFilter;

    const SEARCH_ABLE_FIELDS = [
        'name_bn',
        'name_en',
        'occupation_bn',
        'occupation_en',
        'organization_bn',
        'organization_en',
    ];

    protected $guarded = [];
}
