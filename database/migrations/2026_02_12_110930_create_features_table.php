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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // Seed default features
        DB::table('features')->insert([
            ['name' => 'Dashboard', 'slug' => 'dashboard', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Stores', 'slug' => 'stores', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Staff', 'slug' => 'staff', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Leads', 'slug' => 'leads', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transactions', 'slug' => 'transactions', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Reports', 'slug' => 'reports', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
};
