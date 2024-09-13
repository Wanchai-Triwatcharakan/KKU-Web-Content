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
        Schema::create('bachelors', function (Blueprint $table) {
            $table->id();
            $table->string("bachelors_title");
            $table->integer('priority')->default(1);
            $table->boolean("status_display");
            $table->timestamps();
        });

        DB::table('bachelors')->insert([
            [
                'bachelors_title' => 'เคมีวิทยา',
                'priority' => 1,
                'status_display' => true
            ],
            [
                'bachelors_title' => 'แพทย์ศาสตร์',
                'priority' => 2,
                'status_display' => true
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
        Schema::dropIfExists('bachelors');
    }
};
