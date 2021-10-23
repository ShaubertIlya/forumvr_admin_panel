<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_information', function (Blueprint $table) {
            $table->id();
            $table->string('main_presentation_link')->nullable();
            $table->json('additional_presentation_links')->nullable();
            $table->json('videoclip_links')->nullable();
            $table->json('gallery_links')->nullable();
            $table->string('company_visitcard')->nullable();
            $table->string('model3D_link')->nullable();
            $table->string('gallery_link')->nullable();
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
        Schema::dropIfExists('business_information');
    }
}
