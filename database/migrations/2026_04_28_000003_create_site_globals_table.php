<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_globals', function (Blueprint $table) {
            $table->id();
            // languages.id is INT UNSIGNED (legacy ->increments('id')),
            // so language_id must match — foreignId() defaults to BIGINT.
            $table->unsignedInteger('language_id');
            $table->longText('content_json')->nullable();
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->cascadeOnDelete();
            // One row per language — admin form edits this row in place.
            $table->unique('language_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_globals');
    }
};
