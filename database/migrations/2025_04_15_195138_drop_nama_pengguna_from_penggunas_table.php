<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->dropColumn('nama_pengguna');
        });
    }

    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            $table->string('nama_pengguna')->nullable(); // kalau mau di-rollback
        });
    }
};
