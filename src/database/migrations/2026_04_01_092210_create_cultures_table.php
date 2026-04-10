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
        Schema::create('cultures', function (Blueprint $table) {
        $table->id();
        $table->foreignId('type_culture_id')->constrained('type_cultures')->cascadeOnDelete();
        $table->foreignId('field_id')->constrained()->cascadeOnDelete();
        $table->enum('cycle', ['planting', 'growth', 'treatment', 'harvest', 'done']);
        $table->enum('season', ['printemps', 'été', 'automne', 'hiver']);
        $table->date('planting_date');
        $table->date('harvest_date');
        $table->string('status')->default('pending');
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cultures');
    }
};
