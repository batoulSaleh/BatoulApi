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
        Schema::create('itemms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productt_id')->constrained('productts');
            $table->bigInteger('orderr_id')->nullable();
            $table->bigInteger('cartt_id')->nullable();
            $table->integer('quantity');
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
        Schema::dropIfExists('itemms');
    }
};
