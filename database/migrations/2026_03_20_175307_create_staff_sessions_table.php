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
        Schema::create('staff_sessions', function (Blueprint $table) {
            $table->id();
            // Staff user
            $table->foreignId('user_id')->constrained('user')->cascadeOnDelete();
            $table->foreignId('store_id')->constrained('stores')->cascadeOnDelete();

            // Login time (system generated)
            $table->timestamp('login_at');

            // Logout time (nullable until logout)
            $table->timestamp('logout_at')->nullable();

            $table->string('date');
            $table->string('timezone')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();

            // Indexes for fast reporting
            $table->index(['user_id', 'login_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_sessions');
    }
};
