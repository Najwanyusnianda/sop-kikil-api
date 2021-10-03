<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_progress', function (Blueprint $table) {
            $table->id();
            $table->string('indicator_id',4);
            $table->string('name',50);
            $table->date('completed_date')->nullable();
            $table->boolean('is_complete')->default(false);
            $table->text('note')->nullable();
            $table->date('start_date')->required();
            $table->date('end_date')->required();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('month_num');
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
        Schema::dropIfExists('monthly_progress');
    }
}
