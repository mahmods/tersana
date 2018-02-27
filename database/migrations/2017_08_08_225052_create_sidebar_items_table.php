<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidebarItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->integer('menu_id')->unsigned()->nullable();
            $table->foreign('menu_id')->references('menu_id')->on('sidebar_menus')->onDelete('set null');
            $table->string('name',50)->nullable();
            $table->string('route',50)->nullable()->nullable();
            $table->string('roles_access',15)->nullable();
            $table->string('icon',50)->nullable();
            $table->integer('ordering')->nullable();
            $table->integer('active')->default(1)->nullable();
            $table->string('class',50)->nullable();
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
        Schema::dropIfExists('sidebar_items');
    }
}
