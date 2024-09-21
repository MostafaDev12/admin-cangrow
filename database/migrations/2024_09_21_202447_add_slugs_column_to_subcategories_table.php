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
        Schema::table('subcategories', callback: function (Blueprint $table) {
            if (!Schema::hasColumn('subcategories', 'slug_ar')) {

            $table->text('slug_ar')->nullable();
            $table->text('slug_en')->nullable();
            $table->text('slug_fr')->nullable();
            
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
