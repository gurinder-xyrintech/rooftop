<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('vocabulary_id');
            $table->foreign('vocabulary_id')->references('id')->on('vocabularies');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('root')->nullable();
            $table->unsignedBigInteger('lft')->nullable();
            $table->unsignedBigInteger('rght')->nullable();
            $table->unsignedBigInteger('level')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->text('params')->nullable();
            $table->unsignedBigInteger('total_item');
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
        Schema::dropIfExists('terms');
    }
}
