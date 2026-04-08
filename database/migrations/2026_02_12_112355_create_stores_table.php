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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->enum('store_type', ['physical', 'online'])->default('physical');
            $table->string('name', 100); // Hyoptin, Delux, Online Shop
            $table->integer('country_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('location', 100)->nullable(); // City, Address
            $table->string('qr_code')->nullable(); // store QR code link/image
            $table->string('payment_url')->nullable();
            $table->text('store_image')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->unique(['name', 'location']);
        });

        // DB::table('stores')->insert([
        //     [
        //         'store_type' => 'physical',
        //         'name' => 'Hyoptin',
        //         'location' => 'Physical Branch 1',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'store_type' => 'physical',
        //         'name' => 'Delux',
        //         'location' => 'Physical Branch 2',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        //     [
        //         'store_type' => 'online',
        //         'name' => 'Online Shop',
        //         'location' => 'Website',
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
};
