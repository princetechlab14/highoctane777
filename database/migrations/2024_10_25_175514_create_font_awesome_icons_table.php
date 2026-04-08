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
        Schema::create('font_awesome_icons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('class_name')->unique();
            $table->integer('sequence_order')->default(0);
        });

        DB::table('font_awesome_icons')->insert([
            ['title' => 'YouTube', 'class_name' => 'icofont-youtube', 'sequence_order' => 1],
            ['title' => 'Facebook', 'class_name' => 'icofont-facebook', 'sequence_order' => 2],
            ['title' => 'Instagram', 'class_name' => 'icofont-instagram', 'sequence_order' => 3],
            ['title' => 'Twitter', 'class_name' => 'icofont-twitter', 'sequence_order' => 4],
            ['title' => 'LinkedIn', 'class_name' => 'icofont-linkedin', 'sequence_order' => 5],
            ['title' => 'Pinterest', 'class_name' => 'icofont-pinterest', 'sequence_order' => 6],
            ['title' => 'Telegram', 'class_name' => 'icofont-telegram', 'sequence_order' => 7],
            ['title' => 'Tumblr', 'class_name' => 'icofont-tumblr', 'sequence_order' => 8],
            ['title' => 'Snapchat', 'class_name' => 'icofont-snapchat-ghost', 'sequence_order' => 9],
            ['title' => 'Google', 'class_name' => 'icofont-google', 'sequence_order' => 10],
            ['title' => 'Reddit', 'class_name' => 'icofont-reddit', 'sequence_order' => 11],
            ['title' => 'Android', 'class_name' => 'icofont-android', 'sequence_order' => 12],
            ['title' => 'Dribbble', 'class_name' => 'icofont-dribbble', 'sequence_order' => 13],
            ['title' => 'Vimeo', 'class_name' => 'icofont-vimeo', 'sequence_order' => 14],
            ['title' => 'Vine', 'class_name' => 'icofont-vine', 'sequence_order' => 15],
            ['title' => 'Foursquare', 'class_name' => 'icofont-foursquare', 'sequence_order' => 16],
            ['title' => 'StumbleUpon', 'class_name' => 'icofont-stumbleupon', 'sequence_order' => 17],
            ['title' => 'Flickr', 'class_name' => 'icofont-flickr', 'sequence_order' => 18],
            ['title' => 'Yahoo', 'class_name' => 'icofont-yahoo', 'sequence_order' => 19],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('font_awesome_icons');
    }
};
