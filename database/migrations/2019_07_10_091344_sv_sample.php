<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvSample extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sample', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sample_code',100);
            $table->unsignedBigInteger('kit_id');
            $table->foreign('kit_id')->references('kit_id')->on('kit');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->string('site_name');
            $table->string('water_value');
            $table->string('latitude');
            $table->string('longitude');
            $table->date('sample_date');
            $table->time('sample_time');
            $table->date('sample_received_date')->nullable();
            $table->boolean('is_public');
            $table->text('sample_notes');
            $table->string('dispatch_traking_code');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->boolean('is_deleted');
            $table->string('sample_report')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=>dispatched,2=>received');
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
         Schema::dropIfExists('sample');
    }
}
