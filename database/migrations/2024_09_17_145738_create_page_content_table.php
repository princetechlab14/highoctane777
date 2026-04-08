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
        Schema::create('page_content', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('id')->on('page_section')->onDelete('cascade');
            $table->text('content_image')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('image_title')->nullable();
            $table->text('content')->nullable();
            $table->integer('sequence');
            $table->string('cdate');
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
        Schema::dropIfExists('page_content');
    }
};
