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
        Schema::create('transaction_user', function (Blueprint $table) {
            $table->id();

            // FK на пользователя
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            // FK на транзакцию
            $table->unsignedBigInteger('transaction_id');
            $table->foreign('transaction_id')
                ->references('transactions_id')
                ->on('transactions');

            $table->decimal('amount', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_user');
    }
};
