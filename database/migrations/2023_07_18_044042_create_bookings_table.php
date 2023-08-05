<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->unsignedBigInteger('id_courses');
            $table->integer('quantity');
            $table->string('order_date');
            $table->string('checkin_time');
            $table->string('private_room');
            $table->integer('fee');
            $table->integer('first_visit');
            $table->timestamps();
            $table->foreign('id_courses')->references('id')->on('courses')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
