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
        Schema::create('assento', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('n_assento');
            $table->uuid('onibus_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('onibus_id')->references('id')->on('onibus')->onDelete('cascade');
            $table->unique(['n_assento', 'onibus_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assento');
    }
};
