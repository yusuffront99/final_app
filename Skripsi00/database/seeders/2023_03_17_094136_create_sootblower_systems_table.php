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
        Schema::create('sootblower_systems', function (Blueprint $table) {
            $table->uuid()->primary()->unique();
            $table->foreignUuid('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('nip');
            $table->string('operator_kedua');
            $table->string('atasan');
            $table->string('operator_shift');
            $table->enum('unit', ['Unit 3', 'Unit 4']);
            $table->date('tanggal_update');
            $table->time('jam_update');
            $table->foreignId('sbl_name_id')->constrained('list_sootblowers');
            $table->string('arus');
            $table->foreignId('status_equipment_id')->constrained('status_equipment');
            $table->longText('catatan');
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
        Schema::dropIfExists('sootblower_systems');
    }
};
