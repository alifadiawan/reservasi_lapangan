<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('jenis_lapangan_id')->unsigned();
            $table->foreign('jenis_lapangan_id')->references('id')->on('lapangan')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->BigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('kegiatan');
            $table->text('penanggungjawab');
            $table->BigInteger('kode_booking')->nullable();
            $table->text('tipe_pemesan')->nullable();
            $table->text('status')->nullable();
            $table->text('alasan')->nullable();
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
        Schema::dropIfExists('reservasi');
    }
};
