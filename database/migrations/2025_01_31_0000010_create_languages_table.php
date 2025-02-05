<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
             
            $table->string('photo')->nullable();
            $table->string('language')->nullable();
            $table->string('name')->nullable();
            $table->string('file')->nullable();
            $table->string('sign')->nullable()->default('en');
             
            $table->integer('rtl')->nullable()->default(0);
            $table->integer('is_default')->nullable()->default(0);
         
        });

        $data = [

            'photo' => 'us.svg',
            'language' => 'English',
            'name' => 'en',
            'file' => 'en.json',
            'sign' => 'en',
            'rtl' => 0,
            'is_default' => 1
              
         ] ;

        Language::insert([$data]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languages');
    }
};
