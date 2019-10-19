<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('price',10, 2);
            $table->float('brick_price',10, 2)->default(0);
            $table->unsignedBigInteger('quantity')->default(10);
            $table->string('image')->nullable();
            $table->boolean('measurement_summary')->default(0)->nullable();
            $table->boolean('roof_photo')->default(0)->nullable();
            $table->boolean('logo_customization')->default(0)->nullable();
            $table->boolean('length_measutements')->default(0)->nullable();
            $table->boolean('pitch_measurements')->default(0)->nullable();
            $table->boolean('area_measurements')->default(0)->nullable();
            $table->boolean('waste_calculation_tables')->default(0)->nullable();
            $table->boolean('notes_oage')->default(0)->nullable();
            $table->boolean('editable_format')->default(0)->nullable();
            $table->tinyInteger('estimation_software_compatibility')->nullable();
            $table->string('delivery')->nullable();
            $table->string('report_length')->nullable();
            $table->text('common_users')->nullable();
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
        Schema::dropIfExists('packages');
    }
}
