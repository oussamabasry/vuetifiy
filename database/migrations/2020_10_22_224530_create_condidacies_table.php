<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondidaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condidacies', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('users')  
            //       ->onDelete('cascade');
            $table->unsignedBigInteger('user_profil_id')->index();
            $table->foreign('user_profil_id')
                  ->references('id')
                  ->on('users')  
                  ->onDelete('cascade');
            $table->string('branch'); //filiere
            $table->boolean('accepted')->nullable();
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
        Schema::dropIfExists('condidacies');
    }
}
