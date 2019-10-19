<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('quantity')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');            
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages');
            $table->boolean('delivery')->nullable();
            $table->float('delivery_price',10, 2);
            $table->string('comment')->nullable();
            $table->string('notes')->nullable();
            $table->string('to_team_note')->nullable();
            $table->string('additional_emails')->nullable();
            $table->text('message')->nullable();
            $table->string('report_logo')->nullable();
            $table->string('report_file')->nullable();
            $table->string('send_report_to')->nullable();
            $table->float('discount', 10, 2)->default(0.00);
            $table->string('payment_gateway')->nullable();
            $table->boolean('payment_status')->nullable()->default(0);
            $table->enum('status',['inQueue', 'assigned', 'inProduction', 'awaitingApproval', 'Delivered', 'rejected', 'refunded'])->default('inQueue')->nullable();
            $table->float('refund_price',10, 2)->default(0);
            $table->boolean('type')->nullable();
            $table->text('payment_params')->nullable();
            $table->text('refund_params')->nullable();
            $table->float('total_price',10, 2);
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
        Schema::dropIfExists('orders');
    }
}
