<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = 'suggest';

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];
}
