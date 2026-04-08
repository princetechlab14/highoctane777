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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique(); // Stripe/Paypal transaction ID
            // $table->foreignId('user_id')->constrained('user')->restrictOnDelete(); // customer
            // $table->foreignId('shop_id')->constrained('shops')->restrictOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('user')->nullOnDelete(); // nullable guest user &  // Staff who handled this transaction
            $table->foreignId('store_id')->constrained('stores')->restrictOnDelete();
            $table->foreignId('platform_id')->nullable()->constrained('platform')->nullOnDelete();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('USD');
            $table->enum('payment_method', ['stripe', 'paypal']);
            $table->enum('status', ['pending', 'success', 'failed', 'expired', 'canceled']);
            $table->boolean('is_winner')->default(0);
            $table->decimal('winning_amount', 10, 2)->default(0);
            $table->decimal('paid_amount', 10, 2)->default(0); // total paid to user
            $table->enum('payout_status', ['pending', 'partial', 'paid'])->default('pending');
            $table->string('timezone')->nullable();
            $table->timestamp('transaction_at')->nullable();
            $table->json('payment_response')->nullable(); // store full API/webhook response as JSON
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_countrycode')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->string('customer_mobileid')->nullable();
            $table->string('customer_username')->nullable();
            $table->boolean('is_transferred')->default(0);
            $table->foreignId('transferred_from_store_id')->nullable()->constrained('stores')->nullOnDelete();
            $table->foreignId('transferred_by')->nullable()->constrained('user')->nullOnDelete();
            $table->timestamp('transferred_at')->nullable();
            $table->string('date');
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
        Schema::dropIfExists('transactions');
    }
};
