<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('coworking_id')->constrained('coworkings')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->default('flex');
            $table->text('description')->nullable();
            $table->integer('capacity');
            $table->float('price_hour')->nullable();
            $table->float('price_day')->nullable();
            $table->float('price_month')->nullable();
            $table->float('size_m2')->nullable();
            $table->boolean('available')->default(true);
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spaces');
    }
};
