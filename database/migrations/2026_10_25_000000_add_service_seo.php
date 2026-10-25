<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['ar', 'en', 'fr'] as $locale) {
            foreach (['og_title', 'og_description'] as $field) {
                $column = $field.'_'.$locale;
                if (! Schema::hasColumn('services', $column)) {
                    Schema::table('services', fn (Blueprint $table) => $table->text($column)->nullable());
                }
            }
        }
        if (! Schema::hasColumn('services', 'og_image')) {
            Schema::table('services', fn (Blueprint $table) => $table->string('og_image')->nullable());
        }
        if (! Schema::hasColumn('services', 'is_published')) {
            Schema::table('services', fn (Blueprint $table) => $table->boolean('is_published')->default(true));
        }
        if (! Schema::hasTable('service_slug_histories')) {
            Schema::create('service_slug_histories', function (Blueprint $table) {
                $table->id();
                $table->unsignedInteger('service_id')->index();
                $table->string('locale', 10);
                $table->text('slug');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Intentionally retain metadata and historical URLs on rollback.
    }
};
