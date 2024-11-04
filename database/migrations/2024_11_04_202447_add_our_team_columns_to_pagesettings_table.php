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
        Schema::table('pagesettings', function (Blueprint $table) {
              
            $table->text('our_team_title_ar')->nullable();
            $table->text('our_team_title_en')->nullable();
            $table->text('our_team_details_ar')->nullable();
            $table->text('our_team_details_en')->nullable();
         
            
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
