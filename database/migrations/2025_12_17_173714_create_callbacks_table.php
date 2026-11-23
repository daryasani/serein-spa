<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('callbacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');      // Имя клиента
            $table->string('phone');     // Телефон
            $table->text('comment')->nullable(); // Комментарий (необязательно)
            $table->timestamps();        // created_at и updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('callbacks');
    }
};
