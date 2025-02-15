<?php

namespace App\Models;

use App\Traits\HasHistories;
use Illuminate\Database\Eloquent\Model;

class Injured extends Model
{
    use HasHistories;

    protected $guarded = [];
}
