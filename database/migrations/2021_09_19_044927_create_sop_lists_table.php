<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSopListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sop_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->text('file_url');
            $table->text('type');
           // $table->tinyText('word_tags')->nullable();
           // $table->json('role_tags')->nullable();
            $table->text('description')->nullable();
            $table->text('img_url')->nullable();
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
        Schema::dropIfExists('sop_lists');
    }
}
