<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['user','admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();
            
        });


        DB::table('users')->insert([
            //'firstname' => 'ADMIN',
            //'lastname' => 'Mohamed',
            //'phonenumber' => '0648342583',
            //'CNE' => 'R145637383',
            //'datebirth' => '1999-06-23',
            'email' => 'admin@admin.com',
            'email_verified_at' => '2020-10-16 11:44:16',
            'password' => Hash::make('admin'),
            //'sexe' => 'Homme',
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            //'firstname' => 'ADMIN',
            //'lastname' => 'Mohamed',
            //'phonenumber' => '0648342583',
            //'CNE' => 'R145637383',
            //'datebirth' => '1999-06-23',
            'email' => 'user@user.com',
            'email_verified_at' => '2020-10-16 11:44:16',
            'password' => Hash::make('user'),
            //'sexe' => 'Homme',
            'role' => 'user'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
