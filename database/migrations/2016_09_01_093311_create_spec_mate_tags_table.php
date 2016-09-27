<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecMateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spec_meta_tags', function(Blueprint $table)
        {
            $table->integer('specialist_id')->unsigned()->nullable();
            $table->foreign('specialist_id')->references('id')
                ->on('specialists')->onDelete('cascade');

            $table->integer('meta_tags_id')->unsigned()->nullable();
            $table->foreign('meta_tags_id')->references('id')
                ->on('meta_tags')->onDelete('cascade');

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
