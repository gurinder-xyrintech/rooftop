<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->enum('type',['Admin', 'Employee', 'Customer'])->default('Customer');
            $table->string('status')->default('ActivationPending');            
            $table->string('avatar')->nullable();                      
            $table->unsignedBigInteger('registered');            
            $table->bigInteger('brick_standard')->default(0)->nullable();
            $table->bigInteger('brick_expanded')->default(0)->nullable();
            $table->unsignedBigInteger('brick_claims')->default(0)->nullable();
            $table->integer('assignement')->default(0);
            $table->string('salt')->nullable();
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
        Schema::dropIfExists('users');
    }
}
