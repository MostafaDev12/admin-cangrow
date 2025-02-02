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
             
             
         
            $table->text('label_details_ar')->nullable();
            $table->text('label_details_en')->nullable();
            $table->text('label_details_fr')->nullable();

            $table->string('label_photo')->nullable();

            $table->string('catalogue_photo')->nullable();
            $table->string('catalogue_link')->nullable();
            

             
         
            $table->text('export_details_ar')->nullable();
            $table->text('export_details_en')->nullable();
            $table->text('export_details_fr')->nullable();

            $table->string('export_photo')->nullable();
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
