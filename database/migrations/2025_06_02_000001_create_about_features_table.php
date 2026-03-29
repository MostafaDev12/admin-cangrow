<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('about_features')) {
            Schema::create('about_features', function (Blueprint $table) {
                $table->id();
                $table->string('icon')->nullable();
                $table->string('type')->default('feature');
                $table->string('title_ar')->nullable();
                $table->string('title_en')->nullable();
                $table->string('title_fr')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('about_features');
    }
};
