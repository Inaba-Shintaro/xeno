<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    
    public function users()//【RELATION】「Group belongsToMany Users」
    {
        return $this->belongsToMany('App\User','group_users');
    }
}
