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
            $table->text('description');
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
                'topic' => '',
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
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 1,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 2,
                'language' => 'th',
                'title' => 'บูธ (สำหรับผู้ลงทะเบียน)',
                'keyword' => '',
                'description' => 'ผู้ลงทะเบียนในรูปแบบนี้จะต้องจ่ายค่าเช่าพื้นที่สำหรับ การจัดบูธตามอัตราที่กำหนด',
                'topic' => '',
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
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 2,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 3,
                'language' => 'th',
                'title' => 'Workshop ',
                'keyword' => '',
                'description' => 'ผู้เข้าร่วม workshop จะได้รับความรู้และทักษะ เชิงลึกจากวิทยากร โดยผู้ที่ลงทะเบียนในรูปแบบนี้จะต้องจ่ายค่าธรรมเนียมการเข้าร่วม ตามที่กำหนด',
                'topic' => '',
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
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 3,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 4,
                'language' => 'th',
                'title' => 'Pitching Competition ',
                'keyword' => '',
                'description' => 'ผู้เข้าร่วมจะได้โอกาสนำเสนอไอเดียหรือนวัตกรรม ต่อหน้าคณะกรรมการและผู้เข้าร่วมงานเพื่อชิงเงินรางวัล',
                'topic' => '',
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
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/16/IMG_6777.png',
                'priority' => 4,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 5,
                'language' => 'th',
                'title' => 'ผู้สนับสนุน ',
                'keyword' => '',
                'description' => 'ผู้สนับสนุน',
                'topic' => '',
                'content' => '',
                'category' => ',1,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/20/sup1(1).png',
                'priority' => 5,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 6,
                'language' => 'th',
                'title' => 'First Conference and Exhibition on Health and  Wellness Innovation',
                'keyword' => '',
                'description' => 'ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากร มนุษย์ แหล่งท่องเที่ยวธรรมชาติ และองค์ความรู้ด้านการแพทย์แผนปัจจุบัน และ แผนไทย รวมถึงการผลิตสมุนไพร และผลิตภัณฑ์จากธรรมชาติ อีกทั้งการวิจัย และพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชา',
                'topic' => '',
                'content' => ' <p><span style="font-size:18px"><strong>&nbsp;หลักการและเหตุผล</strong></span></p>

                                <p>&nbsp; &nbsp; &nbsp; &nbsp; ในยุคที่โลกเผชิญกับการเปลี่ยนแปลงในหลายมิติ ทั้งสิ่งแวดล้อม สังคม และ เทคโนโลยีความท้าทายด้านสุขภาพและการดำรงชีวิตคุณภาพ ได้เพิ่มขึ้น การพัฒนานวัตกรรมและสิ่งประดิษฐ์ที่เกี่ยวข้องกับสุขภาพจึงมีความสำคัญ ทั้งในด้านการป้องกันและรักษา รวมถึงอุตสาหกรรม ที่เกี่ยวข้อง เช่น อาหาร เครื่องดื่ม อุปกรณ์ทางการแพทย์ และการท่องเที่ยวเชิงสุขภาพ ประเทศไทยมีศักยภาพในการเป็นผู้นำด้านสุขภาพ ด้วยทรัพยากรมนุษย์ แหล่งท่องเที่ยวธรรมชาติ และองค์ความรู้ด้านการแพทย์แผนปัจจุบันและแผนไทย รวมถึงการผลิตสมุนไพรและผลิตภัณฑ์ จากธรรมชาติ อีกทั้งการวิจัยและพัฒนาเพื่อเสริมสร้างสุขภาพยังเป็นที่ยอมรับในระดับนานาชาติ อย่างไรก็ตาม</p>

                                <p>&nbsp; &nbsp; &nbsp; &nbsp; อุตสาหกรรมสุขภาพในปัจจุบันมีการแข่งขันสูงและเปลี่ยนแปลงอย่างรวดเร็ว การดูแลสุขภาพที่เคยเป็นแบบ &quot;One for All&quot;<br />
                                ได้พัฒนาไปสู่ &quot;Personalized Care&quot; ที่เน้นการดูแลแบบองค์รวม การพัฒนานวัตกรรมด้านนี้จึงต้องสอดคล้องกับการเปลี่ยนแปลงดังกล่าว<br />
                                เพื่อเพิ่มศักยภาพการแข่งขันและผลักดันประเทศไทยให้เป็นศูนย์กลางสุขภาพในเอเชียการบูรณาการระหว่างภาครัฐและเอกชนตลอดห่วงโซ่<br />
                                ของอุตสาหกรรมสุขภาพจึงเป็นสิ่งสำคัญคณะทำงานจากเครือข่ายวิจัยและพัฒนาในหลายภาคส่วนจึงได้ร่วมมือกันจัดการประชุมและนิทรรศการ<br />
                                ในครั้งนี้ขึ้นที่จังหวัดขอนแก่น</p>
                            ',
                'category' => ',9,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/20/Group 259.png',
                'priority' => 6,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 7,
                'language' => 'th',
                'title' => 'ดร.ศักดิ์สิทธิ์ สุ่มมาตย์',
                'keyword' => '',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Fermentum phasellus vel id volutpat dictum orci malesuada purus ut. ',
                'topic' => 'เคมีวิทยา',
                'content' => '',
                'category' => ',10,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => false,
                'allow_delete' => false,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/17/lecturer1.png',
                'priority' => 7,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '2024-12-13 00:00:00',
                'date_end_display' => ''
            ],
            [
                'id' => 8,
                'language' => 'th',
                'title' => 'Lorem ipsum dolor sit',
                'keyword' => '',
                'description' => 'Lorem ipsum dolor sit amet consectetur. Blandit sed tincidunt sit purus lacus consectetur nulla montes.',
                'topic' => '',
                'content' => '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur. Sit urna iaculis cursus morbi egestas. Arcu pulvinar adipiscing in sagittis quisque in nibh. Eleifend sed rutrum egestas in nulla. Sollicitudin ullamcorper mi commodo tempor maecenas tristique a. Ut eget aliquam est at quam et blandit auctor. Sociis id accumsan risus nulla et adipiscing eget. Lacus et ornare vel dictum. Integer pellentesque felis dignissim quisque pharetra arcu lacus id fermentum. Tellus commodo tempor eget pellentesque. Eu augue sociis nunc risus nisi. Enim orci donec netus viverra varius aliquam. Quam sagittis nulla quisque urna hendrerit ut quam morbi. Elit tristique netus lorem vulputate id tincidunt nisi. Ultrices ornare in elementum.</p>

                                <p><img alt="" src="http://localhost:8000/upload/2024/09/20/Rectangle 123.png" style="height:358px; width:808px" /></p>

                                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur. Pellentesque phasellus feugiat vitae turpis id. Cursus malesuada rutrum consectetur feugiat. Orci convallis id senectus ornare. Erat platea nulla amet sed at. Varius urna diam ornare quam. Non elementum cursus egestas dolor odio. Eu ut volutpat blandit convallis pharetra duis diam feugiat. Lectus ac etiam eleifend vestibulum. Sed eget.</p>
                            ',
                'category' => ',5,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => false,
                'allow_delete' => false,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/20/Rectangle 95.png',
                'priority' => 8,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '2024-12-13 00:00:00',
                'date_end_display' => ''
            ],
            [
                'id' => 9,
                'language' => 'th',
                'title' => 'แนวทางการจัดงาน',
                'keyword' => '',
                'description' => 'การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพและความเป็นอยู่ที่ดี โดยครอบคลุมหัวข้อที่สำคัญ
                                ได้แก่ สุขภาพ สมรรถภาพทางกาย โภชนาการ รูปลักษณ์ การนอนหลับ และการมีสติ โดยจะเน้นการแสดงนวัตกรรมและการพัฒนาที่เกี่ยวข้องในด้านเหล่านี้อย่างครบวงจร
                                ',
                'topic' => '',
                'content' => '<p>&nbsp; &nbsp; &nbsp;การประชุมในครั้งนี้มุ่งเน้นที่การพัฒนานวัตกรรมเพื่อสุขภาพและความเป็นอยู่ที่ดี โดยครอบคลุมหัวข้อที่สำคัญ<br />
                                ได้แก่ สุขภาพ สมรรถภาพทางกาย โภชนาการ รูปลักษณ์ การนอนหลับ และการมีสติ โดยจะเน้นการแสดงนวัตกรรมและการพัฒนาที่เกี่ยวข้องในด้านเหล่านี้อย่างครบวงจร<br />
                                &nbsp;</p>
                            ',
                'category' => ',9,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => true,
                'allow_delete' => true,
                'thumbnail_title' => '',
                'thumbnail_link' => '',
                'priority' => 9,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
            ],
            [
                'id' => 10,
                'language' => 'th',
                'title' => 'อัลบั้ม งาน First Conference and Exhibition on Health and Wellness Innovation วันที่ 13 พฤศจิกายน 2567',
                'keyword' => '',
                'description' => 'โรงแรมโฆษะ จังหวัดขอนแก่น',
                'topic' => '',
                'content' => '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur. Sit urna iaculis cursus morbi egestas. Arcu pulvinar adipiscing in sagittis quisque in nibh. Eleifend sed rutrum egestas in nulla. Sollicitudin ullamcorper mi commodo tempor maecenas tristique a. Ut eget aliquam est at quam et blandit auctor. Sociis id accumsan risus nulla et adipiscing eget. Lacus et ornare vel dictum. Integer pellentesque felis dignissim quisque pharetra arcu lacus id fermentum. Tellus commodo tempor eget pellentesque. Eu augue sociis nunc risus nisi. Enim orci donec netus viverra varius aliquam. Quam sagittis nulla quisque urna hendrerit ut quam morbi. Elit tristique netus lorem vulputate id tincidunt nisi. Ultrices ornare in elementum.</p>

                                <p><img alt="" src="http://localhost:8000/upload/2024/09/20/Rectangle 123.png" style="height:358px; width:808px" /></p>

                                <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet consectetur. Pellentesque phasellus feugiat vitae turpis id. Cursus malesuada rutrum consectetur feugiat. Orci convallis id senectus ornare. Erat platea nulla amet sed at. Varius urna diam ornare quam. Non elementum cursus egestas dolor odio. Eu ut volutpat blandit convallis pharetra duis diam feugiat. Lectus ac etiam eleifend vestibulum. Sed eget.</p>
                            ',
                'category' => ',6,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => false,
                'allow_delete' => false,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/20/Rectangle 144 (2).png',
                'priority' => 10,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '2024-11-13 00:00:00',
                'date_end_display' => '2024-11-15 00:00:00'
            ],
            [
                'id' => 11,
                'language' => 'th',
                'title' => 'วันที่ 13 พฤษาจิกายน 2567',
                'keyword' => '',
                'description' => 'Training Workshop “การสร้างนวัตกรรมและเส้นทางสู่ Medical Device & Wellness Tech Business” (จัดร่วมกับ NIA)  เป้าหมาย 25-30 คน  เป็นกลุ่มนักวิจัย บุคลากร บุคคลทั่วไป นักศึกษา รวมวิทยากรเจ้าหน้าที่ประมาณ 40-45 คน (ฝ่ายวิจัยและ รศ.พญ.พรรณทิพา  ว่องไว)',
                'topic' => '',
                'content' => '',
                'category' => ',4,',
                'status_display' => true,
                'defaults' => true,
                'pin' => true,
                'is_maincontent' => false,
                'allow_delete' => false,
                'thumbnail_title' => '',
                'thumbnail_link' => 'upload/2024/09/20/Rectangle 180 (1).png',
                'priority' => 11,
                'iframe' => '',
                'redirect' => null,
                'freetag' => '',
                'date_begin_display' => '',
                'date_end_display' => ''
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
