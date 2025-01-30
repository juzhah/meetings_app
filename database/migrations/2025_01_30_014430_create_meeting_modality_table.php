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
        Schema::create('meeting_modality', function (Blueprint $table) {
            $table->foreignId('meeting_id')->constrained()->onDelete('cascade');
            $table->foreignId('modality_id')->constrained()->onDelete('cascade');
            $table->primary(['meeting_id', 'modality_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meeting_modality');
    }
};
