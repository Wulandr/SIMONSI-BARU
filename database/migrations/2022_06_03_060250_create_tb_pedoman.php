<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPedoman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedoman', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('jenis', ['SBM', 'TorRab', 'SPJ Dasar Hukum', 'SPJ Panduan', 'SPJ Template', 'LPJ']);
            $table->string('file');
            $table->string('tahun');
            $table->string('path');
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
        Schema::dropIfExists('pedoman');
    }
}
