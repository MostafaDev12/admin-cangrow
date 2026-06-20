<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->unique();              // service_{slug}, contact_page, medical_tourism, homepage
            $table->string('name')->nullable();           // admin friendly label
            $table->unsignedInteger('service_id')->nullable()->index();
            $table->tinyInteger('enabled')->default(1);
            $table->string('source_identifier')->nullable();

            $table->text('heading_ar')->nullable();
            $table->text('heading_en')->nullable();
            $table->text('heading_fr')->nullable();

            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_fr')->nullable();

            $table->string('button_text_ar')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('button_text_fr')->nullable();

            $table->text('success_message_ar')->nullable();
            $table->text('success_message_en')->nullable();
            $table->text('success_message_fr')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
