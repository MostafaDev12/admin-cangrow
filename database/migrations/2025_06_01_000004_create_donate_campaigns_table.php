<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('donate_campaigns')) {
            Schema::create('donate_campaigns', function (Blueprint $table) {
                $table->id();
                $table->string('photo')->nullable();
                $table->string('title_ar')->nullable();
                $table->string('title_en')->nullable();
                $table->string('title_fr')->nullable();
                $table->longText('details_ar')->nullable();
                $table->longText('details_en')->nullable();
                $table->longText('details_fr')->nullable();
                $table->string('meta_title_ar')->nullable();
                $table->string('meta_title_en')->nullable();
                $table->string('meta_title_fr')->nullable();
                $table->text('meta_details_ar')->nullable();
                $table->text('meta_details_en')->nullable();
                $table->text('meta_details_fr')->nullable();
                $table->text('short_details_ar')->nullable();
                $table->text('short_details_en')->nullable();
                $table->text('short_details_fr')->nullable();
                $table->string('slug_ar')->nullable();
                $table->string('slug_en')->nullable();
                $table->string('slug_fr')->nullable();
                $table->text('tags')->nullable();
                $table->unsignedBigInteger('category_id')->nullable();
                $table->unsignedBigInteger('parent_id')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('donate_campaigns');
    }
};
