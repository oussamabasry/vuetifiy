<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersProfilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        factory(App\UserProfil::class,100)->make()->each(function($userProfil){
            $userProfil->user_id  = factory(User::class)->create()->id;
            $userProfil->save();
        });
    
    }
}
