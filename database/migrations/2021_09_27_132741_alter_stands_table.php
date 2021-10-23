<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterStandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stands', function (Blueprint $table) {
            $table->bigInteger('event_id')->nullable()->after('id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->boolean('is_free')->default(0)->after('event_id');
            $table->renameColumn('stand_name', 'stand_name_en');
            $table->string('stand_name_ru')->nullable()->after('stand_name_en');
            $table->string('stand_name_kz')->nullable()->after('stand_name_ru');
            $table->text('brief_description_en')->nullable();
            $table->text('brief_description_ru')->nullable();
            $table->text('brief_description_kz')->nullable();
            $table->longText('description_en')->nullable();
            $table->longText('description_ru')->nullable();
            $table->longText('description_kz')->nullable();
            $table->longText('bundle')->nullable();
            $table->json('speakers')->nullable();
            $table->json('video_urls')->nullable();
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
