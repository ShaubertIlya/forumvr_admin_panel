<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_participants', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active')->default(0);
            $table->boolean('can_access_forum')->default(0)->comment('This parameter defines if user is able to get access to forum or not');
            $table->bigInteger('profile_id');
            $table->bigInteger('business_information_id');
            $table->bigInteger('user_event_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            $table->foreign('business_information_id')->references('id')->on('business_information')->onDelete('cascade');
            $table->foreign('user_event_id')->references('id')->on('user_events')->onDelete('cascade');
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
        Schema::dropIfExists('forum_participants');
    }
}
