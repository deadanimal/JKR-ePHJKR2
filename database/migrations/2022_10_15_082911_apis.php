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
        
        Schema::table('kriteria_eph_bangunans', function (Blueprint $table) {
        
            $table->string('markahTL1_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL2_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL3_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL32_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL4_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL5_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL6_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL7_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL8_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL81_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL82_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL83_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL84_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL85_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL9_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL91_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL92_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahTL10_ULASAN_VERIFIKASI')->nullable();
        
            $table->string('markahKT1_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT2_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT21_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT22_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT3_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT31_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT32_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT4_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT5_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT51_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT52_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT53_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT6_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT61_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT62_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT7_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT8_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT9_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT10_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT101_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT102_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT103_ULASAN_VERIFIKASI')->nullable();
            $table->string('markahKT11_ULASAN_VERIFIKASI')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
