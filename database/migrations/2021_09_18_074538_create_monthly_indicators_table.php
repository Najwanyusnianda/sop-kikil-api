<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_indicators', function (Blueprint $table) {
            $table->unsignedInteger('id')->primary();
            $table->string('name',50)->required();
            $table->string('period',10)->required();
            $table->string('type',30)->required();
            $table->text('description')->nullable();
            $table->text('dasar_hukum')->nullable();
            $table->text('lampiran')->nullable();
            $table->text('sop_url')->nullable();
            $table->unsignedTinyInteger('start_day')->required();
            $table->unsignedTinyInteger('end_day')->required();
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
        Schema::dropIfExists('monthly_indicators');
    }
}
