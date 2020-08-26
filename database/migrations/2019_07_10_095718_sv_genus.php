<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvGenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genus', function (Blueprint $table) {
            $table->bigIncrements('genus_id');
            $table->unsignedBigInteger('species_id');
            $table->foreign('species_id')->references('species_id')->on('species');
            $table->string('genus_title');
            $table->text('genus_description');
            $table->string('test_code');
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
        Schema::dropIfExists('genus');
    }
}
