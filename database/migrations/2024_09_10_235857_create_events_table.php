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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('time');
            $table->enum('type', ['paid', 'free']);
            $table->enum('status', ['upcoming', 'past'])->default('upcoming');
            $table->string('category');
            $table->integer('rating')->nullable();
            $table->string('booking_link');
            $table->foreignId('organizer_id')->constrained()->onDelete('cascade');
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
};
