<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpeciesImgToEsv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('esv', function (Blueprint $table) {
            $table->string('species_img')->nullable();;
            $table->string('map_img')->nullable();;
            $table->text('description')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('esv', function (Blueprint $table) {
            //
        });
    }
}
