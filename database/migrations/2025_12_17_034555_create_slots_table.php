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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->foreign('facility_id')->constrained()->cascadeOnDelete();
            $table->time("start_time");
            $table->time("end_time");
            $table->integer("day_of_week")->nullable(); // 0 (Sunday) to 6 (Saturday)
            $table->date("date")->nullable(); // Specific date for one-time slots
            $table->boolean("is_active")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slots');
    }
};
