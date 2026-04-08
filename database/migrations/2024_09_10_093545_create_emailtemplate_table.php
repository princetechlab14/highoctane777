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
        Schema::create('emailtemplate', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('template')->nullable();
            $table->integer('is_delete')->default(0)->comment('0-delete,1-not delete');
            $table->timestamps();
        });

        DB::table('emailtemplate')->insert([
            ['title' => 'Thank You for Showing Interest in Project_name', 'is_delete' => 1],
            ['title' => 'Reset Your Password for Project_name', 'is_delete' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emailtemplate');
    }
};
