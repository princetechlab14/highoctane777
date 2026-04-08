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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->integer('category_id')->default(0);
            $table->integer('subcategory_id')->default(0);
            $table->text('image')->nullable();
            $table->string('thumbnail_alt')->nullable();
            $table->string('thumbnail_title')->nullable();
            $table->text('content')->nullable();
            $table->text('meta_title');
            $table->text('meta_description');
            $table->text('schema')->nullable();
            $table->text('keywords')->nullable();
            $table->text('canonical_url')->nullable();
            $table->integer('type')->comment('0-Page, 1-Blog, 2-Event')->default(0);
            $table->integer('status')->comment('0-Active, 1-Inactive')->default(0);
            $table->string('date');
            $table->integer('eventstatus')->comment('0-Upcoming, 1-Completed')->default(0);
            $table->string('eventdate')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
