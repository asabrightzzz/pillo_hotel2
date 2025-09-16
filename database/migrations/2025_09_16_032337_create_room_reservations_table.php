<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('room_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations')->cascadeOnDelete();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->date('arrival');
            $table->date('departure');
            $table->integer('nights');
            $table->integer('adults');
            $table->integer('child')->default(0);
            $table->integer('infant')->default(0);
            $table->integer('roomrate');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_reservations');
    }
};
