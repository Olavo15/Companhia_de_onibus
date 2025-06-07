<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('viagem_id');
            $table->uuid('passageiro_id');
            $table->uuid('assento_id');
            $table->uuid('onibus_id');
            $table->timestamps();

            $table->foreign('viagem_id')->references('id')->on('viagens')->onDelete('cascade');
            $table->foreign('passageiro_id')->references('id')->on('passageiros')->onDelete('cascade');
            $table->foreign('assento_id')->references('id')->on('assento')->onDelete('cascade');
            $table->foreign('onibus_id')->references('id')->on('onibus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
