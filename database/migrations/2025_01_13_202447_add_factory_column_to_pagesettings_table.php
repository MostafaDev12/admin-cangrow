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
             
              
            $table->text('factory_title_ar')->nullable();
            $table->text('factory_title_en')->nullable();
            $table->text('factory_title_fr')->nullable();
           
         
            $table->text('factory_details_ar')->nullable();
            $table->text('factory_details_en')->nullable();
            $table->text('factory_details_fr')->nullable();

            $table->string('factory_photo')->nullable();
            

            
            $table->text('business_title_ar')->nullable();
            $table->text('business_title_en')->nullable();
            $table->text('business_title_fr')->nullable();
           
         
            $table->text('business_details_ar')->nullable();
            $table->text('business_details_en')->nullable();
            $table->text('business_details_fr')->nullable();

            $table->string('business_photo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pagesettings', function (Blueprint $table) {
        //    $table->dropColumn(['factory_title_ar','factory_title_en','factory_title_fr','factory_details_ar','factory_details_en','factory_details_fr','factory_photo']);
             
        });
    }
};
