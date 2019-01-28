<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', '56')->comment('标题');
            $table->string('content', '255')->comment('内容');
            $table->string('cover','255')->comment('图片');
            $table->string('state', '255')->comment('状态');
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
        Schema::dropIfExists('community_topics');
    }
}
