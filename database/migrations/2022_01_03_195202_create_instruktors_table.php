<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstruktorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruktors', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->bigInteger('nip');
            $table->foreignId('kejuruan_id')->constraint('kejuruans')->onDelete('cascade');
            $table->string('tahun_diklat');
            $table->string('penempatan');
            $table->text('keterangan');
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
        Schema::dropIfExists('instruktors');
    }
}
