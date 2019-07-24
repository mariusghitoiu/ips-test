<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCompletedModuleIdColumnFromModuleReminderTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_reminder_tags', function (Blueprint $table) {
            $table->dropColumn('completed_module_id');
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
            $table->integer('completed_module_id')->nullable()->unsigned()->index();
        });
    }
}
