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
        Schema::create('seminar_rooms', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description")->nullable();
            $table->integer('priority')->default(1);
            $table->boolean("status_display")->default(true);

            $table->timestamps();
        });

        DB::table('seminar_rooms')->insert([
            [
                "title" => "ห้อง 1",
                "description" => "",
                'priority' => 1,
                "status_display" => true
            ],
            [
                "title" => "ห้อง 2",
                "description" => "",
                'priority' => 2,
                "status_display" => true
            ],
            [
                "title" => "ห้อง 3",
                "description" => "",
                'priority' => 3,
                "status_display" => true
            ],
            [
                "title" => "ห้อง 4",
                "description" => "",
                'priority' => 4,
                "status_display" => true
            ],
            [
                "title" => "ห้อง 5",
                "description" => "",
                'priority' => 5,
                "status_display" => true
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
        Schema::dropIfExists('seminar_rooms');
    }
};
