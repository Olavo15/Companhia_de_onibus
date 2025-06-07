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
        Schema::create('viagens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('onibus_id')->nullable();
            $table->uuid('origem_id')->nullable();
            $table->uuid('destino_id')->nullable();
            $table->dateTime('partida_dt');
            $table->dateTime('chegada_dt');
            $table->decimal('valor', 8, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('onibus_id')->references('id')->on('onibus')->onDelete('set null');
            $table->foreign('origem_id')->references('id')->on('locais')->onDelete('set null');
            $table->foreign('destino_id')->references('id')->on('locais')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagens');
    }
};
