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
        Schema::create('page_section', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('p_id');
            $table->foreign('p_id')->references('id')->on('pages')->onDelete('cascade');
            $table->string('heading')->nullable();
            $table->integer('sequence');
            $table->string('sdate');
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
        Schema::dropIfExists('page_section');
    }
};
