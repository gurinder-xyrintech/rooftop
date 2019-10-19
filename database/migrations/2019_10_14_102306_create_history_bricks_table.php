<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryBricksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_bricks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('package');
            $table->unsignedBigInteger('brick_price');
            $table->unsignedBigInteger('quantity');
            $table->unsignedBigInteger('remaining');
            $table->enum('type',['Production', 'Sale'])->default('Production')->nullable();
            $table->enum('status',['close', 'open', 'refund']);
            $table->float('refund_price',8, 2);
            $table->text('payment_params')->nullable();
            $table->text('refund_params')->nullable();
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
        Schema::dropIfExists('history_bricks');
    }
}
