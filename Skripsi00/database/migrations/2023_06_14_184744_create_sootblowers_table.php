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
        Schema::create('sootblowers', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('operator_kedua');
            $table->string('atasan');
            $table->string('operator_shift');
            $table->enum('unit', ['Unit 3', 'Unit 4']);
            $table->date('tanggal_update');
            $table->time('jam_update');
            $table->string('status_sbl1')->nullable();
            $table->string('status_sbl2')->nullable();
            $table->string('status_sbl3')->nullable();
            $table->string('status_sbl4')->nullable();
            $table->string('status_sbl5')->nullable();
            $table->string('status_sbl6')->nullable();
            $table->string('status_sbl7')->nullable();
            $table->string('status_sbl8')->nullable();
            $table->string('status_sbl9')->nullable();
            $table->string('status_sbl10')->nullable();
            $table->string('status_sbl11')->nullable();
            $table->string('status_sbl12')->nullable();
            $table->string('status_sbl13')->nullable();
            $table->string('status_sbl14')->nullable();
            $table->string('status_sbl15')->nullable();
            $table->string('status_sbl16')->nullable();
            $table->string('status_sbl17')->nullable();
            $table->string('status_sbl18')->nullable();
            $table->string('status_sbl19')->nullable();
            $table->string('status_sbl20')->nullable();
            $table->string('status_sbl21')->nullable();
            $table->string('status_sbl22')->nullable();
            $table->string('status_sbl23')->nullable();
            $table->string('status_sbl24')->nullable();
            $table->string('status_sbl25')->nullable();
            $table->string('status_sbl26')->nullable();
            $table->string('status_sbl27')->nullable();
            $table->string('status_sbl28')->nullable();
            $table->string('status_sbl29')->nullable();
            $table->string('status_sbl30')->nullable();
            $table->string('status_sbl31')->nullable();
            $table->string('status_sbl32')->nullable();
            $table->string('status_sbl33')->nullable();
            $table->string('status_sbl34')->nullable();
            $table->string('status_sbl35')->nullable();
            $table->string('status_sbl36')->nullable();
            $table->longText('keterangan');
            $table->text('catatan_spv');
            $table->foreignId('status_equipment_id')->constrained('status_equipment');
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
        Schema::dropIfExists('sootblowers');
    }
};
