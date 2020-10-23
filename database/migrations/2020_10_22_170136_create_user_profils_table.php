<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profils', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phonenumber');
            $table->string('CNE');
            $table->date('datebirth');
            $table->string('sexe');
                                                            
            $table->integer('age');
            $table->string('diploma');
            $table->string('CNI');
            $table->double('grade_s1', 8, 2);
            $table->double('grade_s2', 8, 2);
            $table->double('grade_s3', 8, 2);
            $table->double('grade_s4', 8, 2);
            $table->string('specialty_bac2');
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')  
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profils');
    }
}
