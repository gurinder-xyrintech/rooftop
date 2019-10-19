<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('node_id');
            $table->foreign('node_id')->references('id')->on('nodes');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('username')->nullable();
            $table->string('useremail')->nullable();
            $table->string('userwebsite')->nullable();
            $table->string('ip')->nullable();
            $table->unsignedBigInteger('parent')->nullable();
            $table->string('title')->nullable();
            $table->text('content');
            $table->string('type')->default('comment');
            $table->boolean('status')->default(1);
            $table->unsignedBigInteger('lft')->nullable();
            $table->unsignedBigInteger('rght')->nullable();
            $table->unsignedBigInteger('level')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
