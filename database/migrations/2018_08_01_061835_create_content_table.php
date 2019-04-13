<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('content', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('content',500);
            $table->boolean('is_trend');
            $table->date('content_date');
            $table->string('img',100);
            $table->string('alias',200);
            $table->integer('views');
            $table->integer('user_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content');
    }
}
