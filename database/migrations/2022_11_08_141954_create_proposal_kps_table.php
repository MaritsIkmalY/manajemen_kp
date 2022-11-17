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
        Schema::create('proposal_kps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_dosen')->constrained('dosens');
            $table->foreignId('id_mhs')->constrained('mahasiswas');
            $table->string('file_mhs');
            $table->string('keterangan');
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
        Schema::dropIfExists('proposal_kps');
    }
};
