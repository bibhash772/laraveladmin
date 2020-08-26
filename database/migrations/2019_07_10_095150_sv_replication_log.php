<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvReplicationLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('replication_log', function (Blueprint $table) {
            $table->bigIncrements('replication_id');
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('test_id')->on('test');
            $table->timestamp('run_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('replication_log');
    }
}
