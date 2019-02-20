<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';

    public $timestamps = true;

    protected $guarded = [];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * 关联用户表
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
