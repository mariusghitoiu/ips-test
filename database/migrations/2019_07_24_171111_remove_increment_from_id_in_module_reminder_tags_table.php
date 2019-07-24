<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIncrementFromIdInModuleReminderTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_reminder_tags', function (Blueprint $table) {
            $table->integer('id')->unsigned()->index()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_reminder_tags', function (Blueprint $table) {
            $table->increments('id')->change();
        });
    }
}
