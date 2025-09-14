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
        Schema::table('employees', function (Blueprint $table) {
            // Ubah kolom gender jadi enum dengan opsi Male/Female
            $table->enum('gender', ['Male', 'Female'])->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Balikin ke string panjang 10 misalnya (sesuai sebelumnya)
            $table->string('gender', 10)->nullable()->change();
        });
    }
};
