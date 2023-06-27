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
        Schema::create('fw__pumps', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');;
            $table->string('operator_kedua');
            $table->string('atasan');
            $table->string('operator_shift');
            $table->date('tanggal_update');
            $table->time('jam_update');
            $table->string('arus_FP_A');
            $table->string('arus_FP_B');
            $table->string('status_FP_A');
            $table->string('status_FP_B');
            $table->string('press_FP_A');
            $table->string('press_FP_B');
            $table->longText('info_FP');
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
        Schema::dropIfExists('fw__pumps');
    }
};
