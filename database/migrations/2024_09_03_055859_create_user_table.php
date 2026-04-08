<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('country_code')->nullable();
            $table->string('mobile')->nullable();
            $table->string('password');           
            $table->text('address')->nullable();
            $table->text('p_image')->nullable();
            $table->enum('user_type', ['super_admin', 'sub_admin', 'staff', 'customer']);
            $table->foreignId('role_id')->nullable()->constrained('roles')->nullOnDelete();
            // $table->foreignId('shop_id')->nullable()->constrained('shops')->nullOnDelete();
            $table->foreignId('store_id')->nullable()->constrained('stores')->nullOnDelete();
            $table->decimal('max_payout_limit', 10, 2)->default(0);
            $table->decimal('used_payout_amount', 10, 2)->default(0);
            $table->string('ftoken')->nullable();
            $table->string('date');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('user')->insert([
            [
                'username' => 'superadmin', 
                'name' => 'Game Parlour Admin', 
                'email' => 'demo@gmail.com', 
                'mobile' => '9999999999', 
                'password' => md5('123'), 
                'address' => '',
                'user_type' => 'super_admin',
                'date' => date('d-m-Y'),
                'role_id' => 1,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};