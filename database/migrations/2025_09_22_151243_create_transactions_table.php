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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('transactions_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('currency_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //FK;
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade'); //FK;
            $table->foreign('currency_id')->references('currency_id')->on('currency')->onDelete('cascade'); //FK;
            $table->decimal('amount', 12, 2);
            $table->text('description')->nullable();
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
