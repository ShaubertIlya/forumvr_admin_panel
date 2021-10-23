<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestForConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_for_confirmations', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->string('comment');
            $table->bigInteger('user_id');
            $table->bigInteger('project_id');

            $table->foreign('user_id')->references('id')->on('forum_users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

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
        Schema::dropIfExists('request_for_confirmations');
    }
}
