<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminProfil extends Model
{
    

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function condidacies()
    {
        return $this->hasMany('App\Condidacies');
    }
}
