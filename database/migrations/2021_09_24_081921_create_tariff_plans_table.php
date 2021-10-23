<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTariffPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariff_plans', function (Blueprint $table) {
            $table->id();
            $table->string('tarifplan_name');
            $table->smallInteger('managers_count')->default(0);
            $table->smallInteger('videoclip_links_count')->default(0);
            $table->smallInteger('additional_presentation_links_count')->default(0);
            $table->boolean('model3D_links');
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
        Schema::dropIfExists('tariff_plans');
    }
}
