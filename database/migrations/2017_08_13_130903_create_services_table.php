<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('service_id');
            $table->integer('service_section_id')->unsigned()->nullable();
            $table->foreign('service_section_id')->references('service_section_id')->on('service_sections')->onDelete('set null');
            $table->string('name',100)->nullable();
            $table->string('short_description',300)->nullable();
            $table->text('long_description')->nullable();
            $table->text('image')->nullable();
            $table->integer('active')->default(1)->nullable();
            $table->integer('show_in_homepage')->default(0)->nullable;
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
        Schema::dropIfExists('services');
    }
}
