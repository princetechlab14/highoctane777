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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // super_admin, sub_admin, staff
            $table->enum('user_type',['super_admin', 'sub_admin', 'staff', 'customer'])->default('staff');
            $table->integer('is_delete')->default(0)->comment('0: active, 1: deleted');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['name' => 'Admin',  'user_type' => 'super_admin', 'is_delete' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sub Admin', 'user_type' => 'sub_admin', 'is_delete' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Staff', 'user_type' => 'staff', 'is_delete' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
