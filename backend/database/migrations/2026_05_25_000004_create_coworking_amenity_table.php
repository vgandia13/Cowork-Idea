<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coworking_amenity', function (Blueprint $table) {
            $table->foreignUuid('coworking_id')->constrained('coworkings')->cascadeOnDelete();
            $table->foreignUuid('amenity_id')->constrained('amenities')->cascadeOnDelete();
            $table->primary(['coworking_id', 'amenity_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coworking_amenity');
    }
};
