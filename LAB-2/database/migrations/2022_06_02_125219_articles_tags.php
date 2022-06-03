<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('articleTags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('tagId');

            $table->foreign('articleId')->references('id')->on('articles');
            $table->foreign('tagId')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articleTags');
    }
};
