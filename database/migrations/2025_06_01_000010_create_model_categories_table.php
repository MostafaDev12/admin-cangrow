<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('model_categories')) {
            Schema::create('model_categories', function (Blueprint $table) {
                $table->id();
                $table->string('photo')->nullable();
                $table->string('title_ar')->nullable();
                $table->string('title_en')->nullable();
                $table->string('title_fr')->nullable();
                $table->longText('details_ar')->nullable();
                $table->longText('details_en')->nullable();
                $table->longText('details_fr')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('model_categories');
    }
};
