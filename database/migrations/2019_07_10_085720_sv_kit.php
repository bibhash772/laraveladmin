<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvKit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit', function (Blueprint $table) {
            $table->bigIncrements('kit_id');
            $table->string('kit_title')->nullable();;
            $table->text('kit_description')->nullable();;
            $table->string('kit_code');
            $table->unsignedTinyInteger('kit_status_id');
            $table->foreign('kit_status_id')->references('kit_m_status_id')->on('kit_master');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->boolean('is_deleted');
            $table->timestamp('deleted_at');
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
        Schema::dropIfExists('kit');
    }
}
