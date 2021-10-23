<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_events', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');

            $table->bigInteger('user_id');
            $table->bigInteger('available_event_id');
            $table->foreign('user_id')->references('id')->on('forum_users')->onDelete('cascade');
            $table->foreign('available_event_id')->references('id')->on('available_events')->onDelete('cascade');

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
        Schema::dropIfExists('user_events');
    }
}
