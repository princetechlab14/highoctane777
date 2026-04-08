<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('country_code')->nullable();
            $table->bigInteger('mobile');
            $table->string('email')->nullable();
            $table->string('date');
            $table->integer('status')->comment('0-New,1-Process,2-Converted,3-Not interested')->default(0);
            $table->integer('source')->comment('0-Offline,1-Website');
            $table->text('subject')->nullable();
            $table->text('message')->nullable();
            $table->integer('page_id')->default(0);
            $table->text('cancel_reason')->nullable();
            $table->integer('notification_status')->default(0)->comment('0-unread,1-read');
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
        Schema::dropIfExists('leads');
    }
};
