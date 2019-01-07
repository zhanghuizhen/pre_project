<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table = 'topic';

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

}
