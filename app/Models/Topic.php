<?php

namespace App\Models;

class Topic extends BaseModel
{
    protected $table = 'topic';

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

}
