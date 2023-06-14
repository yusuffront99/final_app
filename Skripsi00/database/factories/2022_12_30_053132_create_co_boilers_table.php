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
        Schema::create('co_boilers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id');
            $table->string('operator_shift');
            $table->enum('unit', ['Unit 3', 'Unit 4']);
            $table->string('nama_peralatan');
            $table->date('tanggal_update');
            $table->time('jam_update');
            $table->string('operasi_awal');
            $table->string('rencana_operasi');
            $table->string('operasi_akhir');
            $table->string('status_kegiatan');
            $table->string('status_peralatan');
            $table->longText('keterangan');
            $table->char('status_equipment_id');
            $table->text('catatan');
            $table->softDeletes();
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
        Schema::dropIfExists('co_boilers');
    }
};
