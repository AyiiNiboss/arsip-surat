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
        Schema::table('tb_sk', function (Blueprint $table) {
            $table->enum('sifat', ['biasa','penting'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_sk', function (Blueprint $table) {
            $table->enum('sifat', ['biasa','segera','sangat segera'])->change();
        });
    }
};
