<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableForDatatimeFieldsInUserProgres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_progress', function (Blueprint $table) {
            $table->dateTime('started_at')->nullable()->change();
            $table->dateTime('ended_at')->nullable()->change();
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
            $table->dateTime('started_at')->change();
            $table->dateTime('ended_at')->change();
        });
    }
}
