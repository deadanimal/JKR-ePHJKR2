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
        Schema::create('projeks', function (Blueprint $table) {
            $table->id();

            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('poskod')->nullable();
            $table->string('bandar')->nullable();
            $table->string('negeri')->nullable();
            $table->string('keluasanTapak')->nullable();
            $table->integer('jumlahBlokBangunan')->nullable();            
            $table->string('tarikhJangkaMulaPembinaan')->nullable();
            $table->string('tarikhJangkaSiapPembinaan')->nullable();
            $table->string('kaedahPelaksanaan')->nullable();
            $table->string('jenisPerolehan')->nullable();
            $table->integer('kosProjek')->nullable();
            $table->string('jenisProjek')->nullable();
            $table->string('kategori')->nullable();
            
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
        Schema::dropIfExists('projeks');
    }
};
