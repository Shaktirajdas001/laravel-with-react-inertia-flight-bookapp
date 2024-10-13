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
        Schema::create('flight_booking', function (Blueprint $table) {
            $table->id();
            $table->string('flight_name')->nullable();
            $table->string('take_of_location')->nullable();
            $table->string('landing_loaction')->nullable();
            $table->string('take_of_time')->nullable();
            $table->string('landing_time')->nullable();
            $table->dateTime('takeof_date')->nullable();
            $table->dateTime('landing_date')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            $table->bigInteger('booking_days_id')->nullable();
            $table->string('booking_day')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_booking');
    }
};
