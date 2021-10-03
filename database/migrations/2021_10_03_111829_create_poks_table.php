<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kegiatan',10);
            $table->string('kode_kro',20)->nullable();
            $table->string('kode_ro',20)->nullable();
            $table->string('kode_komponen',10)->nullable();
            $table->string('kode_sub_komponen',10)->nullable();
            $table->string('kode_akun',30)->nullable();
            $table->string('kode_detail',30)->nullable();
            $table->text('deskripsi_detail')->nullable();
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
        Schema::dropIfExists('poks');
    }
}
