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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('language');
            $table->string('slug')->nullable();
            $table->string('title');
            $table->string('keyword')->nullable();
            $table->string('description');
            $table->text('freetag')->nullable();
            $table->string('h1')->nullable();
            $table->string('h2')->nullable()->nullable();
            $table->text('short_url')->nullable()->nullable();
            $table->string('thumbnail_title')->nullable();
            $table->string('thumbnail_link')->nullable();
            $table->string('thumbnail_size')->nullable();
            $table->string('thumbnail_alt')->nullable();
            $table->string('topic')->nullable();
            $table->text('content')->nullable();
            $table->text('iframe')->nullable();
            $table->text('category');
            $table->text('tags')->nullable();
            $table->text('redirect')->nullable();
            $table->text('link_facebook')->nullable();
            $table->text('link_twitter')->nullable();
            $table->text('link_instagram')->nullable();
            $table->text('link_youtube')->nullable();
            $table->text('link_line')->nullable();
            $table->dateTime('date_begin_display')->nullable();
            $table->dateTime('date_end_display')->nullable();
            $table->boolean('status_display')->default(false);
            $table->boolean('pin')->default(false);
            $table->boolean('defaults')->default(false);
            $table->integer('post_view')->default(0);
            $table->integer('priority')->default(1);
            $table->string('meta_tag')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->boolean('allow_delete')->default(false)->comment("ถ้าเป็น true ลบได้เฉพาะ SuperAdmin");
            $table->boolean('is_maincontent')->default(false)->comment("ถ้าเป็น false = dynamic content");
            $table->integer('last_update_by')->nullable();
            $table->timestamps();
            $table->unique(['language','slug']);
        });
        DB::statement('ALTER TABLE `posts` DROP PRIMARY KEY, ADD PRIMARY KEY (`id`, `language`) USING BTREE');
        DB::table('posts')->insert([
            [
                'id' => 1,
                'language' => 'th',
                'title' => 'ผู้ฟังทั่วไป (ฟรี)',
                'keyword' => '',
                'description' => 'ผู้เข้าร่วมในรูปแบบนี้สามารถเข้าฟังการบรรยายหลัก ในงานประชุมวิชาการได้โดยไม่มีค่าใช้จ่าย',
                'content' => '<ul>
                                <li>ผู้เข้าร่วมในรูปแบบนี้สามารถเข้าฟังการบรรยายหลักในงานประชุมวิชาการได้<br />
                                โดยไม่มีค่าใช้จ่าย</li>
                                <li>เหมาะสำหรับบุคคลทั่วไป นักศึกษา หรือผู้ที่สนใจในหัวข้อวิชาการที่จัดในงาน</li>
                                <li>ผู้เข้าฟังทั่วไปจะได้รับสิทธิ์ในการเข้าฟังตามตารางการประชุม แต่ไม่รวมถึงสิทธิพิเศษอื่น ๆ เช่น การเข้าร่วม workshop หรือสิทธิพิเศษสำหรับผู้สนับสนุน</li>
                            </ul>',
                'category' => ',3,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 1,
                'iframe' => '',
                'redirect' => null,
                'freetag' => ''
            ],
            [
                'id' => 2,
                'language' => 'th',
                'title' => 'บูธ (สำหรับผู้ลงทะเบียน)',
                'keyword' => '',
                'description' => 'ผู้ลงทะเบียนในรูปแบบนี้จะต้องจ่ายค่าเช่าพื้นที่สำหรับ การจัดบูธตามอัตราที่กำหนด',
                'content' => '<ul>
                                <li>ผู้เข้าร่วมในรูปแบบนี้สามารถเข้าฟังการบรรยายหลักในงานประชุมวิชาการได้<br />
                                โดยไม่มีค่าใช้จ่าย</li>
                                <li>เหมาะสำหรับบุคคลทั่วไป นักศึกษา หรือผู้ที่สนใจในหัวข้อวิชาการที่จัดในงาน</li>
                                <li>ผู้เข้าฟังทั่วไปจะได้รับสิทธิ์ในการเข้าฟังตามตารางการประชุม แต่ไม่รวมถึงสิทธิพิเศษอื่น ๆ เช่น การเข้าร่วม workshop หรือสิทธิพิเศษสำหรับผู้สนับสนุน</li>
                            </ul>',
                'category' => ',3,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 2,
                'iframe' => '',
                'redirect' => null,
                'freetag' => ''
            ],
            [
                'id' => 3,
                'language' => 'th',
                'title' => 'Workshop ',
                'keyword' => '',
                'description' => 'ผู้เข้าร่วม workshop จะได้รับความรู้และทักษะ เชิงลึกจากวิทยากร โดยผู้ที่ลงทะเบียนในรูปแบบนี้จะต้องจ่ายค่าธรรมเนียมการเข้าร่วม ตามที่กำหนด',
                'content' => '<ul>
                                <li>ผู้เข้าร่วมในรูปแบบนี้สามารถเข้าฟังการบรรยายหลักในงานประชุมวิชาการได้<br />
                                โดยไม่มีค่าใช้จ่าย</li>
                                <li>เหมาะสำหรับบุคคลทั่วไป นักศึกษา หรือผู้ที่สนใจในหัวข้อวิชาการที่จัดในงาน</li>
                                <li>ผู้เข้าฟังทั่วไปจะได้รับสิทธิ์ในการเข้าฟังตามตารางการประชุม แต่ไม่รวมถึงสิทธิพิเศษอื่น ๆ เช่น การเข้าร่วม workshop หรือสิทธิพิเศษสำหรับผู้สนับสนุน</li>
                            </ul>',
                'category' => ',3,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 3,
                'iframe' => '',
                'redirect' => null,
                'freetag' => ''
            ],
            [
                'id' => 4,
                'language' => 'th',
                'title' => 'Pitching Competition ',
                'keyword' => '',
                'description' => 'ผู้เข้าร่วมจะได้โอกาสนำเสนอไอเดียหรือนวัตกรรม ต่อหน้าคณะกรรมการและผู้เข้าร่วมงานเพื่อชิงเงินรางวัล',
                'content' => '<ul>
                                <li>ผู้เข้าร่วมในรูปแบบนี้สามารถเข้าฟังการบรรยายหลักในงานประชุมวิชาการได้<br />
                                โดยไม่มีค่าใช้จ่าย</li>
                                <li>เหมาะสำหรับบุคคลทั่วไป นักศึกษา หรือผู้ที่สนใจในหัวข้อวิชาการที่จัดในงาน</li>
                                <li>ผู้เข้าฟังทั่วไปจะได้รับสิทธิ์ในการเข้าฟังตามตารางการประชุม แต่ไม่รวมถึงสิทธิพิเศษอื่น ๆ เช่น การเข้าร่วม workshop หรือสิทธิพิเศษสำหรับผู้สนับสนุน</li>
                            </ul>',
                'category' => ',3,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 4,
                'iframe' => '',
                'redirect' => null,
                'freetag' => ''
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
        Schema::dropIfExists('posts');
    }
};
