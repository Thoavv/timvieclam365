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
            $table->boolean('status')->default(true);
            $table->integer('vacancy_count');
            $table->string('address');
            $table->boolean('homeflag')->default(false);
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
