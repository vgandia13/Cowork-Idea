<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coworkings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('schedule')->nullable();
            $table->text('description')->nullable();
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('cover')->nullable();
            $table->json('gallery')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coworkings');
    }
};
