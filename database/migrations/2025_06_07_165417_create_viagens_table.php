<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('viagens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('onibus_id')->nullable();
            $table->string('origem', 50);
            $table->string('destino', 50);
            $table->dateTime('partida_dt');
            $table->dateTime('chegada_dt');
            $table->float('valor', 8, 2);
            $table->timestamps();

            $table->foreign('onibus_id')->references('id')->on('onibus')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('viagens');
    }
};
