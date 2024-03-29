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
        Schema::create('package_storage', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->integer('price');
            $table->integer('duration');
            $table->string('description');
            $table->boolean('status');
            $table->integer('homeflag');
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
        Schema::dropIfExists('package_storage');
    }
};
