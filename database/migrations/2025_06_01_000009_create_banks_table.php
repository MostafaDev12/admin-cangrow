<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('banks')) {
            Schema::create('banks', function (Blueprint $table) {
                $table->id();
                $table->string('type')->nullable();
                $table->string('title_ar')->nullable();
                $table->string('title_en')->nullable();
                $table->string('location')->nullable();
                $table->string('currency')->nullable();
                $table->string('account')->nullable();
                $table->string('code')->nullable();
                $table->string('iban')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
