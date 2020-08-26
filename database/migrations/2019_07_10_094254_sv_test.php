<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('test', function (Blueprint $table) {
            $table->bigIncrements('test_id');
            $table->string('test_title');
            $table->text('test_description');
            $table->string('test_code');
            $table->unsignedBigInteger('kit_id');
            $table->foreign('kit_id')->references('kit_id')->on('kit');
            $table->timestamp('run_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('replication_number');
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
         Schema::dropIfExists('test');
    }
}
