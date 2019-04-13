<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameFromContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('content', 'contents');
        Schema::table('content', function (Blueprint $table) {

           // $table->renameColumn('sub_category_id', 'sub_content_cateogry_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
        Schema::table('content', function (Blueprint $table) {
        });
    }
}
