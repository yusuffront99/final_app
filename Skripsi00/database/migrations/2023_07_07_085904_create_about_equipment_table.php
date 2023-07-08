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
        Schema::create('about_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('name_equipment')->unique();
            $table->string('position');
            $table->longText('description');
            $table->longText('specification');
            $table->longText('img_equipment');
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
        Schema::dropIfExists('about_equipment');
    }
};
