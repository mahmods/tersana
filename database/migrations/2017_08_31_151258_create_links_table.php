<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('link_id');
            $table->integer('link_section_id')->unsigned()->nullable();
            $table->foreign('link_section_id')->references('link_section_id')->on('link_sections')->onDelete('set null');
            $table->string('title',255)->nullable();
            $table->string('route',255)->nullable();
            $table->integer('active')->default('0')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('links');
    }
}
