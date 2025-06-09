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
        Schema::table('onibus', function (Blueprint $table) {
            $table->uuid('motorista_id')->nullable()->after('max_assento');
            $table->foreign('motorista_id')->references('id')->on('motoristas')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('onibus', function (Blueprint $table) {
            $table->dropForeign(['motorista_id']);
            $table->dropColumn('motorista_id');
        });
    }
};
