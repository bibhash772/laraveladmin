<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SvUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_no',25);
            $table->string('password_reset_token')->nullable();
            $table->string('auth_key')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');
            $table->string('country');
            $table->text('address');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->boolean('is_deleted')->default(0)->comment('1=>deleted,0=>not deleted');
            $table->timestamp('deleted_at');
            $table->tinyInteger('status')->comment('1=>active,0=>inactive');
            $table->tinyInteger('user_type')->comment('1=>admin,2=>lab executive,3=>Pubic Users,4=>Corporate Clients');
            $table->rememberToken();
            $table->string('account_activation_token')->nullable();
            $table->boolean('is_account_activated')->default(0)->comment('1=>activated,0=>not activated');
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
        Schema::dropIfExists('user');
    }
}
