<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_sections', function (Blueprint $table) {
            $table->increments('service_section_id');
            $table->string('name',255)->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->string('class',50)->nullable();
            $table->string('icon',50)->nullable()->default('fa fa-book');
            $table->integer('active')->default(1)->nullable();
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
        Schema::dropIfExists('service_sections');
    }
}
