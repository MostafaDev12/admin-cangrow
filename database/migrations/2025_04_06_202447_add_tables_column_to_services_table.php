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
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'table_titles_ar')) {
            $table->string('details_photo')->nullable();
            $table->text('table_titles_ar')->nullable();
            $table->text('table_details_ar')->nullable();  
            
            $table->text('table_titles_en')->nullable();
            $table->text('table_details_en')->nullable();
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
