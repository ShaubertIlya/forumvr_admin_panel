<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->string('project_name_en');
            $table->string('project_name_ru');
            $table->string('project_name_kz');
            $table->text('brief_description_en');
            $table->text('brief_description_ru');
            $table->text('brief_description_kz');
            $table->longText('description_en');
            $table->longText('description_ru');
            $table->longText('description_kz');
            $table->longText('speakers_en');
            $table->longText('speakers_ru');
            $table->longText('speakers_kz');
            $table->longText('project_bundle');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('event_ip')->nullable();
            $table->string('event_port')->nullable();
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
        Schema::dropIfExists('events');
    }
}
