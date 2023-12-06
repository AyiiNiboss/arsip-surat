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
        Schema::table('tb_sm', function (Blueprint $table) {
            $table->dropColumn('no_agenda');
            $table->dropColumn('status');
            $table->dropColumn('sifat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_sm', function (Blueprint $table) {
            $table->string('no_agenda');
            $table->enum('status', ['Asli', 'Tembusan']);
            $table->enum('sifat', ['segera', 'sangat segera']);
        });
    }
};
