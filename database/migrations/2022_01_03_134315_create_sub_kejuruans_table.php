<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubKejuruansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kejuruans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kurikulum');
            $table->string('image');
            $table->foreignId('kejuruan_id')->constraint('kejuruans')->onDelete('cascade');
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
        Schema::dropIfExists('sub_kejuruans');
    }
}
