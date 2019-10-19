<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promocodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('code');
            $table->string('title');
            $table->text('description');
            $table->string('title_slug');
            $table->string('prefix');
            $table->string('discount_type');
            $table->unsignedBigInteger('discount');
            $table->string('discount_applies_on');
            $table->string('type_of_report');
            $table->tinyInteger('min_reports_purchased');
            $table->string('report_based_on');
            $table->unsignedBigInteger('min_reports_count');
            $table->string('reports_purchased_condition');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->tinyInteger('noExpiry');
            $table->string('usage_limit_type');
            $table->unsignedBigInteger('usage_limit');
            $table->tinyInteger('limit_per_user');
            $table->unsignedBigInteger('limit');
            $table->tinyInteger('applies_on_brick');
            $table->boolean('status')->default(1);
            $table->dateTime('expired');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders');
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
        Schema::dropIfExists('promocodes');
    }
}
