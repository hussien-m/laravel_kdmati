<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_method_id')->constrained('payment_methods');
            $table->morphs('paymentable');
            $table->morphs('payer');
            $table->float('amount');
            $table->string('currency_code');
            $table->enum('type',['refund','payment'])->default('payment');
            $table->enum('status',['completed','cancelled','failed','pending'])->default('pending');
            $table->string('transaction_id')->nullable();
            $table->json('payment_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
