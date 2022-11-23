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
        Schema::create('pengajuan_mhs_models', function (Blueprint $table) {
            $table->id();
            $table->string("nama_tempat");
            $table->boolean("status")->nullable();
            $table->string("job");
            $table->string("alamat");
            $table->foreignId("id_dosen")->constrained('dosens')->nullable();
            $table->foreignId("id_mhs")->constrained('mahasiswas')->nullable();
            $table->timestamps();
        });
        Schema::rename('pengajuan_mhs_models', 'pengajuan_mhs');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_mhs');
    }
};
