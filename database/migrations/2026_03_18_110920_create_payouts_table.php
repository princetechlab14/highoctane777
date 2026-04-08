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
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('user')->nullOnDelete(); // customer
            $table->foreignId('created_by')->nullable()->constrained('user')->nullOnDelete(); // admin/staff
            $table->string('transaction_id');
            $table->index('transaction_id');
            $table->string('stripe_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->text('reason')->nullable();
            $table->enum('status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('source', ['system','stripe','webhook'])->default('system');
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
        Schema::dropIfExists('payouts');
    }
};
