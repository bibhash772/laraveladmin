<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvUserActivitiesLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities_log', function (Blueprint $table) {
            $table->bigIncrements('activity_id');
            $table->unsignedBigInteger('activity_type_id');
            $table->foreign('activity_type_id')->references('activity_type_id')->on('user_activity_type');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activities_log');
    }
}
