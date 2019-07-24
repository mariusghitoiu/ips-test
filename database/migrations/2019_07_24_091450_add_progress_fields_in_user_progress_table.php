<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgressFieldsInUserProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_progress', function (Blueprint $table) {
            $table->dateTime('ended_at')->after('module_id')->index();
            $table->dateTime('started_at')->after('module_id')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_progress', function (Blueprint $table) {
            $table->dropColumn('started_at');
            $table->dropColumn('ended_at');
        });
    }
}
