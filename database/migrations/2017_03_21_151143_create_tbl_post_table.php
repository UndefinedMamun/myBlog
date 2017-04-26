<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_title',100)->unique();
            $table->integer('user_id');
            $table->string('post_details',1000);
            $table->string('post_image')->nullable();
            $table->integer('mc_id');
            $table->integer('sc_id')->nullable();
            $table->tinyInteger('publication_status');
            $table->tinyInteger('is_featured')->default(0);
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
        Schema::dropIfExists('tbl_post');
    }
}
