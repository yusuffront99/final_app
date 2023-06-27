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
        Schema::create('burner_systems', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip');
            $table->string('operator_kedua');
            $table->string('atasan');
            $table->string('operator_shift');
            $table->enum('unit', ['Unit 3', 'Unit 4']);
            $table->date('tanggal_update');
            $table->time('jam_update');
            $table->longText('ket_burner1');
            $table->longText('ket_burner2');
            $table->longText('ket_burner3');
            $table->longText('ket_burner4');
            $table->string('status_burner1');
            $table->string('status_burner2');
            $table->string('status_burner3');
            $table->string('status_burner4');
            $table->foreignId('status_equipment_id')->constrained('status_equipment');
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
        Schema::dropIfExists('burner_systems');
    }
};
