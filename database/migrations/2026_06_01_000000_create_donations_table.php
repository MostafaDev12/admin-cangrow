<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           if (!Schema::hasTable('donations')) {

        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('order_id')->unique();
            $table->string('payment_session_id')->nullable();
            $table->string('transaction_id')->nullable();

            $table->decimal('amount', 10, 2)->default(0);
            $table->string('currency')->default('EGP');

            $table->string('type')->nullable();
            $table->text('service_name')->nullable();

            $table->string('name')->nullable();
            $table->string('phone')->nullable();

            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending');

            $table->text('response_data')->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
