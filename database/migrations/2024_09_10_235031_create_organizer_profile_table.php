<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizer_profile', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('facebook_link');
            $table->string('linkedin_link');
            $table->string('twitter_link');
            $table->foreignId('organizer_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organizer_profile');
    }
};
