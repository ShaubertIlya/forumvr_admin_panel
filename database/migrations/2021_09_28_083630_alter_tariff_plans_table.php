<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTariffPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tariff_plans', function (Blueprint $table) {
            $table->renameColumn('tarifplan_name', 'tarifplan_name_en');
            $table->string('tarifplan_name_ru')->nullable()->after('tarifplan_name_en');
            $table->string('tarifplan_name_kz')->nullable()->after('tarifplan_name_ru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
