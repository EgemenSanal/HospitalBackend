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
        Schema::create('emergency_responses', function (Blueprint $table) {
            $table->id();
            $table->string('EmergencyMessage');
            $table->string('Response');
            $table->integer('SeverityLevel');
            $table->string('Status');
            $table->string('from');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_responses');
    }
};
