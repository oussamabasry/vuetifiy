<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condidacies extends Model
{
    

    // public function user(){
    //     return $this->belongsTo('App\User');
    // }

    public function userProfil(){
        return $this->belongsTo('App\UserProfil');
    }
}
