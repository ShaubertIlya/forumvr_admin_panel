<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangesToStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stands', function (Blueprint $table) {
            $table->string('speaker_en')->nullable()->after('speakers');
            $table->string('speaker_ru')->nullable()->after('speakers');
            $table->string('speaker_kz')->nullable()->after('speakers');
            $table->dropColumn(['speakers']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stands', function (Blueprint $table) {
            //
        });
    }
}
