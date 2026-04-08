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
        Schema::create('websetting', function (Blueprint $table) {
            $table->id();
            $table->string('hlogo')->nullable();
            $table->string('flogo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('whatsapp_mobileno')->nullable();
            $table->string('call_mobileno')->nullable();
            $table->string('address')->nullable();
            $table->text('location')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_crypto')->nullable();
            $table->string('from')->nullable();
            $table->string('receive_inquiry_email')->nullable();
            $table->string('cc')->nullable();
            $table->integer('indexing')->comment('0-Off, 1-On')->default(0);
            $table->text('g_webconsol')->nullable();
            $table->text('g_analytics')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->text('tawk_content')->nullable();
            $table->text('footer_content')->nullable();
            $table->text('stripe_key')->nullable();
            $table->text('stripe_secret')->nullable();
            $table->text('stripe_webhook_secret')->nullable();
            $table->text('currency')->nullable();
            $table->timestamps();
        });

        DB::table('websetting')->insert([
            ['hlogo' => null, 'flogo' => null],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websetting');
    }
};
