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
    
        Schema::table('viagens', function (Blueprint $table) {
            $table->uuid('motorista_id')->nullable()->after('onibus_id');
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('viagens', function (Blueprint $table) {
            $table->dropForeign(['motorista_id']);
            $table->dropColumn('motorista_id');
        });
    }
};
