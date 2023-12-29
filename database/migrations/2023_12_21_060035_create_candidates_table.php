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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->integer('post_id');
            $table->string('link_cv');
            $table->integer('status');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
};
