<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id('PenjualanID');
            $table->date('TanggalPenjualan');
            $table->decimal('TotalHarga', 10, 2);
            $table->unsignedBigInteger('PelangganID');
            $table->timestamps();
        
            $table->foreign('PelangganID')->references('PelangganID')->on('pelanggans')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penjualans');
    }
}
