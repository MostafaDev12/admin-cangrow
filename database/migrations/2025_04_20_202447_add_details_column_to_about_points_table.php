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
        Schema::table('about_points', function (Blueprint $table) {
            if (!Schema::hasColumn('about_points', 'details_ar')) {

            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_fr')->nullable();
            
             }
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
