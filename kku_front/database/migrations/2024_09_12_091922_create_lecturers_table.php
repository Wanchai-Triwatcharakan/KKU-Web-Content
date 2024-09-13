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
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string("lecture_name");
            $table->string("profile_image")->nullable();
            $table->string("description")->nullable();
            $table->string("bachelor_id");
            $table->string("line_id")->nullable();
            $table->string("facebook_id")->nullable();
            $table->string("telephone_id", 10)->nullable();
            $table->date("date_lecture");
            $table->integer('priority')->default(1);
            $table->boolean("status_display");
            $table->timestamps();
        });

        DB::table('lecturers')->insert([
            [
                'lecture_name' => 'ดร.ศักดิ์สิทธิ์ สุ่มมาตย์',
                'profile_image' => "",
                'bachelor_id' => 1,
                'date_lecture' => "2024-09-13",
                'priority' => 1,
                'status_display' => true
            ],
            [
                'lecture_name' => 'ดร.ศักดิ์สิทธิ์ สุ่มมาตย์',
                'profile_image' => "",
                'bachelor_id' => 2,
                'date_lecture' => "2024-09-14",
                'priority' => 2,
                'status_display' => true
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
};
