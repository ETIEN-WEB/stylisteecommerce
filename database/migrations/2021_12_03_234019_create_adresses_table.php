<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ville_id');
            $table->string('first_name');
            $table->string('name');
            $table->string('contact1');
            $table->string('contact2')->nullable();
            $table->text('adresse_detail');
            $table->text('info_suplementaire')->nullable();
            $table->string('current_adresse')->nullable();
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
        Schema::dropIfExists('adresses');
    }
}
