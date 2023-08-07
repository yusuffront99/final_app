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
        Schema::create('edg_systems', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip');
            $table->string('operator_kedua');
            $table->string('atasan');
            $table->string('operator_shift');
            $table->date('tanggal_update');
            $table->string('lev_bbm_awal');
            $table->string('lev_oli');
            $table->string('teg_battery');
            $table->string('jam_start');
            $table->string('teg_out');
            $table->string('frekuensi');
            $table->string('putaran');
            $table->string('temp_coolant');
            $table->string('press_oli');
            $table->string('jam_stop');
            $table->string('lev_bbm_akhir');
            $table->foreignId('status_equipment_id')->constrained('status_equipment');
            $table->string('kondisi_peralatan'); 
            $table->longText('keterangan'); 
            $table->text('catatan_spv'); 
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
        Schema::dropIfExists('edg_systems');
    }
};
