<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatingNullToContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('content', function (Blueprint $table) {
            $table->boolean('is_trend')->nullable(true)->change();
            $table->date('content_date')->nullable(true)->change();
            $table->string('alias',200)->nullable(true)->change();
            $table->integer('views')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('content', function (Blueprint $table) {
            //
        });
    }
}
