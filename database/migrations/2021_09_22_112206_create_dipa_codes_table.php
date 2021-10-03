<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipaCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipa_codes', function (Blueprint $table) {
            $table->id();
            $table->string('dipa_code',100)->nullable(); //kode gabunngan kegiatan
            $table->string('kegiatan_code',50)->nullable();
            $table->text('kegiatan_name')->nullable();
            $table->string('kro_code',50)->nullable();
            $table->text('kro_name')->nullable();
            $table->string('ro_code',50)->nullable();
            $table->text('ro_name')->nullable();
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
        Schema::dropIfExists('dipa_codes');
    }
}
