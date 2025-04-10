<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('penggunas', function (Blueprint $table) {
        $table->string('password')->change();
    });
}

public function down()
{
    Schema::table('penggunas', function (Blueprint $table) {
        $table->integer('password')->change(); // sesuaikan dengan default sebelumnya kalau ada
    });
}
};
