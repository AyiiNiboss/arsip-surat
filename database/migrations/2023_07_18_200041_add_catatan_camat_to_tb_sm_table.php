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
            $table->text('catatan_camat')->nullable()->after('catatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_sm', function (Blueprint $table) {
            if (Schema::hasColumn('tb_sm', 'catatan_camat')) {
                $table->dropColumn('catatan_camat');
            }
        });
    }
};
