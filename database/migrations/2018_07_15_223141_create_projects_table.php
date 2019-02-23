<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(255);
        Schema::create('projects', function (Blueprint $table) {

            $table->increments('id');

            //strings
            $table->string("title");
            $table->string("language",100); // EX. PHP,HTMl
            $table->integer("by"); // EX. by : ysf or abd (id)
            $table->string("byName"); // EX. by : ysf or abd (name)

            //long strings
            $table->text("slug");

            $table->text("description"); // short description
            $table->text("content");
            $table->text("imgs"); // all images of project in json
            $table->text("demoUrl"); // EX. elzahaby.cv.com/TitleOfProject
            $table->text("gitUrl"); // github link
            //date
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
        Schema::dropIfExists('projects');
    }
}
