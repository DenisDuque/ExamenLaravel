<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('casals', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->dateTime('data_inici');
            $table->dateTime('data_final');
            $table->integer('n_places');
            $table->unsignedBigInteger('ciutat_id');
            $table->foreign('ciutat_id')->references('id')->on('ciutats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casals');
    }
};
