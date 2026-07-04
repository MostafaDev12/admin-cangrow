<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('site_stats')) {
            Schema::create('site_stats', function (Blueprint $table) {
                $table->increments('id');
                $table->text('section')->nullable();
                $table->text('icon')->nullable();
                $table->text('value')->nullable();
                $table->text('title_ar')->nullable();
                $table->text('title_en')->nullable();
                $table->text('title_fr')->nullable();
                $table->integer('sort_order')->default(0);
                $table->tinyInteger('is_active')->default(1);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
            });
        }

        if (!Schema::hasTable('features')) {
            Schema::create('features', function (Blueprint $table) {
                $table->increments('id');
                $table->text('section')->nullable();
                $table->text('photo')->nullable();
                $table->text('icon')->nullable();
                $table->text('title_ar')->nullable();
                $table->text('title_en')->nullable();
                $table->text('title_fr')->nullable();
                $table->text('details_ar')->nullable();
                $table->text('details_en')->nullable();
                $table->text('details_fr')->nullable();
                $table->integer('sort_order')->default(0);
                $table->tinyInteger('is_active')->default(1);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
            });
        }

        if (!Schema::hasTable('service_sections')) {
            Schema::create('service_sections', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('service_id')->nullable();
                $table->text('photo')->nullable();
                $table->text('title_ar')->nullable();
                $table->text('title_en')->nullable();
                $table->text('title_fr')->nullable();
                $table->text('details_ar')->nullable();
                $table->text('details_en')->nullable();
                $table->text('details_fr')->nullable();
                $table->integer('sort_order')->default(0);
                $table->tinyInteger('is_active')->default(1);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_sections');
        Schema::dropIfExists('features');
        Schema::dropIfExists('site_stats');
    }
};
