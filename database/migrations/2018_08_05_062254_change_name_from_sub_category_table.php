<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameFromSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('sub_content_category', 'sub_content_categories');
        // Schema::table('sub_content_categories', function (Blueprint $table) {
        //     $table->rename('sub_content_category','sub_content_categories');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_content_categories');
        Schema::table('sub_content_category', function (Blueprint $table) {
        });
    }
}
