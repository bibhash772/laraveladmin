<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvUserKit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_kit', function (Blueprint $table) {
            $table->bigIncrements('user_kit_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->boolean('is_activated');
            $table->string('kit_code');
            $table->unsignedBigInteger('kit_id');
            $table->foreign('kit_id')->references('kit_id')->on('kit');
            $table->bigInteger('created_by');
            $table->boolean('is_deleted');
            $table->timestamp('deleted_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
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
         Schema::dropIfExists('user_kit');
    }
}
