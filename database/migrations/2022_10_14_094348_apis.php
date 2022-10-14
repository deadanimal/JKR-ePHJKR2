<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('kriteria_eph_bangunans', function (Blueprint $table) {
            $table->foreignId('projek_id')->nullable()->constrained('projeks')->cascadeOnDelete();
        });
    }

    public function down()
    {
        //
    }
};
