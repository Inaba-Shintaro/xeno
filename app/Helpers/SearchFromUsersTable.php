<?php

namespace App\Helpers;

use App\User;

function SearchFromUsersTable($request){
    $memberUsers = [];
    
    $memberUsers[] = User::findOrFail($request->user_id_0);
    if(isset($request->user_id_1)){
        $memberUsers[] = User::findOrFail($request->user_id_1);
    }
    if(isset($request->user_id_2)){
        $memberUsers[] = User::findOrFail($request->user_id_2);
    }
    if(isset($request->user_id_3)){
        $memberUsers[] = User::findOrFail($request->user_id_3);
    }
    return $memberUsers;
}

