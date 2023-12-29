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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summary');
            $table->text('content');
            $table->string('image')->nullable();
            $table->integer('job_typeid');
            $table->string('detail_link');
            $table->integer('display_order');
            $table->integer('post_typeid');
            $table->integer('authorid');
            $table->date('posting_date');
            $table->date('closing_date');
            $table->integer('status');
            $table->integer('vacancy_count');
            $table->string('address');
            $table->integer('homeflag');
            $table->string('phone_number');
            $table->date('end_date');
            $table->integer('like_pt');
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
        Schema::dropIfExists('posts');
    }
};
