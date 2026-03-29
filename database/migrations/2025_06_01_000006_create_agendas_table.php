<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('agendas')) {
            Schema::create('agendas', function (Blueprint $table) {
                $table->id();
                $table->string('title_ar')->nullable();
                $table->string('title_en')->nullable();
                $table->string('title_fr')->nullable();
                $table->longText('details_ar')->nullable();
                $table->longText('details_en')->nullable();
                $table->longText('details_fr')->nullable();
                $table->date('date')->nullable();
                $table->string('location_ar')->nullable();
                $table->string('location_en')->nullable();
                $table->string('location_fr')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
