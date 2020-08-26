<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvEsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('esv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('test_id', ['Fish', 'Algae']);
            $table->string('esv_id');
            $table->string('kingdom')->nullable();;
            $table->string('phylum')->nullable();;
            $table->string('class')->nullable();;
            $table->string('order')->nullable();;
            $table->string('family')->nullable();;
            $table->string('genus')->nullable();;
            $table->string('species')->nullable();;
            $table->string('common_name')->nullable();;
            $table->string('perc_match')->nullable();;
            $table->string('sequence')->nullable();;
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
        Schema::dropIfExists('esv');
    }
}
