<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvKitStatusLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit_status_log', function (Blueprint $table) {
            $table->bigIncrements('kit_status_log_id');
            $table->unsignedBigInteger('kit_id');
            $table->foreign('kit_id')->references('kit_id')->on('kit');
            $table->unsignedTinyInteger('status_id');
            $table->foreign('status_id')->references('kit_m_status_id')->on('kit_master');
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
        Schema::dropIfExists('kit_status_log');
    }
}
