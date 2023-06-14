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
        Schema::create('lfo_systems', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('nip');
            $table->foreignUuid('user_id');
            $table->string('operator_kedua');
            $table->string('atasan');
            $table->string('operator_shift');
            $table->enum('unit', ['Unit 3', 'Unit 4']);
            $table->date('tanggal_update');
            $table->time('jam_update');
            $table->string('arus_HP_A');
            $table->string('arus_HP_B');
            $table->string('status_HP_A');
            $table->string('status_HP_B');
            $table->string('press_HP_A');
            $table->string('press_HP_B');
            $table->string('DP_High');
            $table->longText('info_HP');
            $table->foreignUuid('forwarding_id');
            $table->string('status_equipment_id');
            $table->longText('catatan');
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
        Schema::dropIfExists('lfo_systems');
    }
};
