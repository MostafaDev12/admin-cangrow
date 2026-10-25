<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            foreach (['ar', 'en', 'fr'] as $locale) {
                $table->text('og_title_'.$locale)->nullable();
                $table->text('og_description_'.$locale)->nullable();
            }
            $table->string('og_image')->nullable();
            $table->boolean('is_published')->default(true);
        });
        Schema::create('service_slug_redirects', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('service_id')->index();
            $table->string('locale', 2);
            $table->string('slug', 255);
            $table->unique(['locale', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_slug_redirects');
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['og_title_ar', 'og_title_en', 'og_title_fr', 'og_description_ar', 'og_description_en', 'og_description_fr', 'og_image', 'is_published']);
        });
    }
};
