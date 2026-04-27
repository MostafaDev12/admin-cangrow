<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('page_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->cascadeOnDelete();
            $table->foreignId('language_id')->nullable()->constrained()->nullOnDelete();
            $table->string('key');
            $table->string('path')->nullable();
            $table->timestamps();

            // NOTE: MySQL treats NULL as not equal to NULL inside UNIQUE indexes,
            // so multiple rows with the same (page_id, key) and language_id=NULL are
            // technically allowed by the engine. The seeder uses updateOrCreate to
            // enforce semantic uniqueness for the language-agnostic case.
            $table->unique(['page_id', 'language_id', 'key']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('page_images');
    }
};
