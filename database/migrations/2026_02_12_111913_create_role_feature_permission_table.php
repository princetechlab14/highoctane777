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
        Schema::create('role_feature_permission', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('feature_id')->constrained('features')->onDelete('cascade');
            $table->boolean('can_view')->default(false);
            $table->boolean('can_create')->default(false);
            $table->boolean('can_edit')->default(false);
            $table->boolean('can_delete')->default(false);
            $table->unique(['role_id', 'feature_id']);
            $table->timestamps();
        });

        $roles = DB::table('roles')->get();
        $features = DB::table('features')->get();

        foreach ($roles as $role) {
            foreach ($features as $feature) {
                $canCreate = false;
                $canEdit = false;
                $canDelete = false;

                if ($role->name === 'Admin' || $role->name === 'super_admin' || $role->name === 'Super Admin' || $role->name === 'Super-Admin' || $role->name === 'SUPER_ADMIN' || $role->name === 'SUPER ADMIN' || $role->name === 'SUPER-ADMIN') {
                    $canCreate = true;
                    $canEdit = true;
                    $canDelete = true;
                } elseif ($role->name === 'Sub Admin' || $role->name === 'sub_admin' || $role->name === 'Sub-Admin' || $role->name === 'Subadmin' || $role->name === 'SUB_ADMIN' || $role->name === 'SUB ADMIN' || $role->name === 'SUB-ADMIN') {
                    $canCreate = true;
                    $canEdit = true;
                    $canDelete = false;
                } elseif ($role->name === 'Staff' || $role->name === 'staff' || $role->name === 'STAFF') {
                    $canCreate = false;
                    $canEdit = false;
                    $canDelete = false;
                }

                DB::table('role_feature_permission')->insert([
                    'role_id' => $role->id,
                    'feature_id' => $feature->id,
                    'can_view' => true,
                    'can_create' => $canCreate,
                    'can_edit' => $canEdit,
                    'can_delete' => $canDelete,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_feature_permission');
    }
};
