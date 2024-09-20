<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('post_images', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('portfolio_id')->nullable();
            $table->integer('design_id')->nullable();
            $table->integer('post_id')->nullable();
            $table->string('image_link');
            $table->string('alt')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('position')->default(1);
            $table->string('language')->nullable();
            $table->string('defaults')->default(0);
            $table->integer('update_by')->nullable();
            $table->timestamps();
        });

        DB::table('post_images')->insert([
            [
                'post_id' => 1,
                'image_link' => 'upload/2024/09/20/P1017165.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 2,
                'image_link' => 'upload/2024/09/20/P1017165.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 3,
                'image_link' => 'upload/2024/09/20/P1017165.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 4,
                'image_link' => 'upload/2024/09/20/P1017165.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup1.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup2.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 2,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup3.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 3,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup4.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 4,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup5.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 5,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup6.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 6,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup7.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 7,
                'language' => 'th',
            ],
            [
                'post_id' => 5,
                'image_link' => 'upload/2024/09/20/sup8.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 8,
                'language' => 'th',
            ],
            [
                'post_id' => 9,
                'image_link' => 'upload/2024/09/20/way1.png',
                'alt' => '',
                'title' => 'สุขภาพ',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 9,
                'image_link' => 'upload/2024/09/20/way2.png',
                'alt' => '',
                'title' => 'สมรรถภาพทางกาย',
                'description' => '',
                'position' => 2,
                'language' => 'th',
            ],
            [
                'post_id' => 9,
                'image_link' => 'upload/2024/09/20/way3.png',
                'alt' => '',
                'title' => 'โภชนาการ',
                'description' => '',
                'position' => 3,
                'language' => 'th',
            ],
            [
                'post_id' => 9,
                'image_link' => 'upload/2024/09/20/way4.png',
                'alt' => '',
                'title' => 'รูปลักษณ์',
                'description' => '',
                'position' => 4,
                'language' => 'th',
            ],
            [
                'post_id' => 9,
                'image_link' => 'upload/2024/09/20/way5.png',
                'alt' => '',
                'title' => 'การนอนหลับ',
                'description' => '',
                'position' => 5,
                'language' => 'th',
            ],
            [
                'post_id' => 9,
                'image_link' => 'upload/2024/09/20/way6.png',
                'alt' => '',
                'title' => 'การมีสติ',
                'description' => '',
                'position' => 6,
                'language' => 'th',
            ],
            [
                'post_id' => 10,
                'image_link' => 'upload/2024/09/20/Rectangle 144.png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 1,
                'language' => 'th',
            ],
            [
                'post_id' => 10,
                'image_link' => 'upload/2024/09/20/Rectangle 144 (2)(1).png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 2,
                'language' => 'th',
            ],
            [
                'post_id' => 10,
                'image_link' => 'upload/2024/09/20/Rectangle 144(1).png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 3,
                'language' => 'th',
            ],
            [
                'post_id' => 10,
                'image_link' => 'upload/2024/09/20/Rectangle 144 (2)(2).png',
                'alt' => '',
                'title' => '',
                'description' => '',
                'position' => 4,
                'language' => 'th',
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
        Schema::dropIfExists('post_images');
    }
};
