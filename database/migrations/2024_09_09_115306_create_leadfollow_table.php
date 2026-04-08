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
        Schema::create('leadfollow', function (Blueprint $table) {
            $table->id();
            $table->integer('l_id');
            $table->foreign('l_id')->references('id')->on('leads')->onDelete('cascade');
            $table->string('date');
            $table->text('comment');
            $table->string('n_f_date');
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
        Schema::dropIfExists('leadfollow');
    }
};
