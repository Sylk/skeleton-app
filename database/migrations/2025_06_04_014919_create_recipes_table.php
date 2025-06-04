<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index(); // Index for ordering/searching
            $table->string('slug')->unique();
            $table->text('description');
            $table->json('ingredients');
            $table->json('steps');
            $table->string('author_email')->index(); // Index for exact match searches
            $table->timestamps();

            // Composite index for common search patterns
            $table->index(['author_email', 'created_at']);

            // Full-text index for better search performance (MySQL only)
            if (config('database.default') === 'mysql') {
                $table->fullText(['name', 'description']);
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
