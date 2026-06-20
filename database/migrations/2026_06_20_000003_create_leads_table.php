<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('form_id')->nullable()->index();
            $table->string('form_key')->nullable()->index();   // denormalized source key
            $table->string('source_page')->nullable();
            $table->unsignedInteger('service_id')->nullable()->index();

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('subject')->nullable();
            $table->string('treatment')->nullable();
            $table->string('preferred_date')->nullable();
            $table->text('message')->nullable();
            $table->json('payload')->nullable();

            $table->string('status')->default('new');          // new, contacted, booked, closed
            $table->text('admin_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
