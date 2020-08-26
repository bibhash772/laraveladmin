<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvSampleReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sample_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sample_id')->nullable(); 
            $table->integer('replicate');
            $table->enum('test_id', ['Fish', 'Algae']);
            $table->string('esv_id')->nullable();
            $table->string('perc_reads')->nullable();
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
        Schema::dropIfExists('sample_report');
    }
}
