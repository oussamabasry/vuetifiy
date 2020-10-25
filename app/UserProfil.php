<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfil extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'phonenumber',
        'CNE',
        'datebirth',
        'sexe',
        // 'age',
        // 'diploma',
        // 'CNI',
        // 'grade_s1',
        // 'grade_s2',
        // 'grade_s3',
        // 'grade_s4',
        // 'specialty_bac2',
     ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function condidacies()
    {
        return $this->hasMany('App\Condidacies');
    }
}
