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
        Schema::create('hsd_levels', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');;
            $table->string('operator_shift');
            $table->float('storage_level', 4 ,2);
            $table->float('daily_level', 4, 2);
            $table->enum('status', ['Normal','Abnormal']);
            $table->foreignId('status_equipment_id')->constrained('status_equipment');
            $table->longText('info_hsd');
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
        Schema::dropIfExists('hsd_levels');
    }
};
