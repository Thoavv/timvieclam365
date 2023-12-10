<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->boolean('IsActive')->default(true);
            $table->string('MenuName', 50);
            $table->string('ControllerName', 50)->nullable();
            $table->integer('Levels');
            $table->integer('ParentID')->nullable();
            $table->integer('MenuOrder')->nullable();
            $table->integer('Position');
            $table->string('Link', 250)->nullable();
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
        Schema::dropIfExists('menus');
    }
};
