<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPageViewArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * 新增page_view
     * 修改feature
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->integer('page_view')->after('feattured');
            $table->renameColumn('feattured', 'feature');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->renameColumn('feature', 'feattured');
            $table->dropColumn('page_view');
        });
    }
}
