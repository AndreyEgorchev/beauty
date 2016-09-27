<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecCity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spec_city', function(Blueprint $table)
        {
            $table->integer('specialist_id')->unsigned()->index();
            $table->foreign('specialist_id')->references('id')
                ->on('specialists')->onDelete('cascade');

            $table->integer('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');

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
        //
    }
}
