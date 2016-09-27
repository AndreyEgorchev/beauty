<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecSpeciality extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spec_speciality', function(Blueprint $table)
        {
            $table->integer('specialist_id')->unsigned()->index();
            $table->foreign('specialist_id')->references('id')
                ->on('specialists')->onDelete('cascade');

            $table->integer('speciality_id')->unsigned()->index();
            $table->foreign('speciality_id')->references('id')
                ->on('specialities')->onDelete('cascade');

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
