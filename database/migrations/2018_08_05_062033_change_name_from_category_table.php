<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNameFromCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('content_category', 'content_categories');
        // Schema::table('content_categories', function (Blueprint $table) {
        //     $table->rename('content_category','content_categories');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('content_categories');
        Schema::table('content_category', function (Blueprint $table) {
        });
    }
}
