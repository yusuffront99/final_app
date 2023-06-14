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
        Schema::create('forwardings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('update_ke');
            $table->string('arus_FP_A');
            $table->string('arus_FP_B');
            $table->string('status_FP_A');
            $table->string('status_FP_B');
            $table->string('press_FP_A');
            $table->string('press_FP_B');
            $table->longText('info_FP');
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
        Schema::dropIfExists('forwardings');
    }
};
