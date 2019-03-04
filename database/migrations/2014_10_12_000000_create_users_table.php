<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('img')->default('/logoc.png');
            $table->string('cover')->default("https://a.top4top.net/p_944jawmq1.jpg");
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            /**
             * Roles
             * 0) The Manger ;-)
             * 1) Normal User Can't  Do anything except Edit His Profile
             * 2) Starter Worker Can Mange His Skills , Social Information  For His CV Page, Add Projects And Write Posts
             * 3) Writer Can Only Write Posts
             * 4) User Management and Hr
             */
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
