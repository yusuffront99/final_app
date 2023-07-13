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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('burner_system_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('category');
            $table->longText('description');
            $table->string('item_sp_1');
            $table->string('item_sp_2');
            $table->string('item_sp_3');
            $table->string('item_price_1');
            $table->string('item_price_2');
            $table->string('item_price_3');
            $table->string('item_total_1');
            $table->string('item_total_2');
            $table->string('item_total_3');
            $table->string('total_price');
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
        Schema::dropIfExists('maintenances');
    }
};
