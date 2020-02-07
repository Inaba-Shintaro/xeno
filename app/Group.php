<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()//【RELATION】「Group belongsToMany Users」
    {
        return $this->belongsToMany('App\User','group_users');
    }
}
