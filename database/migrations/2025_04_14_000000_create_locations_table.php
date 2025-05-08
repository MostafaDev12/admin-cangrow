<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Generalsetting;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            
           
            $table->text('title_ar')->nullable();
            $table->text('title_en')->nullable();
            $table->text('title_fr')->nullable();
            
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->text('details_fr')->nullable();
           
           
            $table->text('address_ar')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_fr')->nullable();
           
           
            $table->text('date_ar')->nullable();
            $table->text('date_en')->nullable();
            $table->text('date_fr')->nullable();
            
            $table->text('map')->nullable();
             
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
