<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    public function userProfile(){
        return $this->hasOne('App\UserProfil');
    }

    public function adminProfile(){
        return $this->hasOne('App\UserProfil');
    }
    // public function condidacies()
    // {
    //     return $this->hasMany('App\Condidacies');
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin() {
        return $this->role === 'admin';
     }

     public function isUser() {
        return $this->role === 'user';
     }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
