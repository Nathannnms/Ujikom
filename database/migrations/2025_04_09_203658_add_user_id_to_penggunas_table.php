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
        Schema::table('penggunas', function (Blueprint $table) {
            // Menambahkan kolom user_id
            $table->unsignedBigInteger('user_id')->after('pengguna_id');
            
            // Menambahkan foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penggunas', function (Blueprint $table) {
            // Menghapus foreign key
            $table->dropForeign(['user_id']);
            
            // Menghapus kolom user_id
            $table->dropColumn('user_id');
        });
    }
};

