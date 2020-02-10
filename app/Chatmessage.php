<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
     // ここから追加
     protected $fillable = ['group_id', 'user_id', 'message'];

     public function Group()
     {
         return $this->belongsTo('App\Group');
     }
 
     public function user()
     {
         return $this->belongsTo('App\User');
     }
}
