<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidebarMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebar_menus', function (Blueprint $table) {
            $table->increments('menu_id');
            $table->string('name',50);
            $table->string('roles_access',50);
            $table->string('icon',50);
            $table->integer('ordering');
            $table->integer('active')->default(1);;
            $table->integer('have_header')->default(1);
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
        Schema::dropIfExists('sidebar_menus');
    }
}
