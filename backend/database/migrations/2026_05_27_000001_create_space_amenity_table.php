<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('space_amenity', function (Blueprint $table) {
            $table->foreignUuid('space_id')->constrained('spaces')->cascadeOnDelete();
            $table->foreignUuid('amenity_id')->constrained('amenities')->cascadeOnDelete();
            $table->primary(['space_id', 'amenity_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('space_amenity');
    }
};
