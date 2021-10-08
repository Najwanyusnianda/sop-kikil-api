<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkpaMonthliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikpa_monthlies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ikpa_id');
            $table->unsignedInteger('month_num');
            $table->unsignedInteger('value'); //scale 1-100)
            $table->float('final_value',8,2); //after convert with bobot 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikpa_monthlies');
    }
}
