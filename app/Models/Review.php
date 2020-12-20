<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function getNickname()
    {
        return $this->member->nickname;
    }
}
