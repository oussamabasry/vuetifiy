<?php

use App\User;
use Illuminate\Database\Seeder;

class CondidaciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_profils = App\UserProfil::all();

        factory(App\Condidacies::class,100)->make()->each(function($condidacie) use ($users_profils){
            $condidacie->user_profil_id =$users_profils->random()->id;
            $condidacie->save();
        });
    }
}
