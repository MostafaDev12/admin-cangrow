<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('socialsettings')) {
            Schema::create('socialsettings', function (Blueprint $table) {
                $table->id();
                $table->string('facebook')->nullable();
                $table->string('twitter')->nullable();
                $table->string('gplus')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('dribble')->nullable();
                $table->string('youtube')->nullable();
                $table->tinyInteger('ystatus')->default(0);
                $table->tinyInteger('f_status')->default(0);
                $table->tinyInteger('t_status')->default(0);
                $table->tinyInteger('g_status')->default(0);
                $table->tinyInteger('l_status')->default(0);
                $table->tinyInteger('i_status')->default(0);
                $table->string('instagram')->nullable();
                $table->tinyInteger('d_status')->default(0);
                $table->tinyInteger('f_check')->default(0);
                $table->tinyInteger('g_check')->default(0);
                $table->string('fclient_id')->nullable();
                $table->string('fclient_secret')->nullable();
                $table->string('fredirect')->nullable();
                $table->string('gclient_id')->nullable();
                $table->string('gclient_secret')->nullable();
                $table->string('gredirect')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('socialsettings');
    }
};
