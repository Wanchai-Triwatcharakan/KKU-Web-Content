<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_slides', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id')->default(0);
            $table->string('ad_image');
            $table->string('ad_image_alt')->nullable();
            $table->string('ad_image_title')->nullable();
            $table->string('ad_title')->nullable();
            $table->string('ad_description')->nullable();
            $table->integer('ad_type')->default(1)->comment('1: ภาพหน้าหลัก, 2: ภาพโฆษณา');
            $table->integer('ad_position_id')->default(1);
            $table->integer('ad_priority')->default(1);
            $table->string('ad_link')->nullable();
            $table->string('ad_redirect')->nullable();
            $table->string('ad_h1')->nullable();
            $table->string('ad_h2')->nullable();
            $table->boolean('ad_status_display')->default(true);
            $table->dateTime('ad_date_display')->nullable();
            $table->dateTime('ad_date_hidden')->nullable();
            $table->string('language')->nullable();
            $table->string('defaults')->default(false);
            $table->timestamps();
        });
        DB::statement('ALTER TABLE `ad_slides` DROP PRIMARY KEY, ADD PRIMARY KEY (`id`, `language`) USING BTREE');

        DB::table('ad_slides')->insert([
            [
                'page_id' => 1,
                'ad_title' => '',
                'ad_description' => '',
                'ad_image' => 'upload/2024/09/11/slide1.png',
                'ad_position_id' => 2,
                'ad_priority' => 1,
                'language' => 'th',
                'defaults' => true
            ],
            [
                'page_id' => 1,
                'ad_title' => '',
                'ad_description' => '',
                'ad_image' => 'upload/2024/09/11/slide2.png',
                'ad_position_id' => 2,
                'ad_priority' => 2,
                'language' => 'th',
                'defaults' => true
            ],
            [
                'page_id' => 1,
                'ad_title' => '',
                'ad_description' => '',
                'ad_image' => 'upload/2024/09/11/slide3.png',
                'ad_position_id' => 2,
                'ad_priority' => 3,
                'language' => 'th',
                'defaults' => true
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_slides');
    }
};
