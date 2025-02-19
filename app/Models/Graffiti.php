<?php

namespace App\Models;

use App\Traits\HasHistories;
use Illuminate\Database\Eloquent\Model;

class Graffiti extends Model
{
    use HasHistories        ;

    protected $guarded = [];
}
