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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete(); // Store
            $table->foreignId('user_id')->constrained('user')->cascadeOnDelete(); // Who entered this withdrawal (admin/subadmin)
            $table->decimal('amount', 10, 2); // Withdrawal amount
            $table->string('currency', 10)->default('USD');
            $table->enum('status', ['pending', 'approved', 'paid'])->default('approved');
            $table->string('payment_method')->nullable(); // bank, paypal, stripe
            $table->text('notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->integer('is_deleted')->default(0)->comment('0 = active, 1 = deleted');
            $table->date('withdrawal_date')->nullable();
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
        Schema::dropIfExists('withdrawals');
    }
};
