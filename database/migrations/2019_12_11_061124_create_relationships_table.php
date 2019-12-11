<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('lesson',function(Blueprint $table){
            $table->foreign('classId')->references('id')->on('classes')->onDelete('cascade');
        });
        Schema::table('users',function(Blueprint $table){
            $table->foreign('roleId')->references('id')->on('role')->onDelete('cascade');
        });
        Schema::table('course',function(Blueprint $table){
            $table->foreign('managerId')->references('id')->on('manager')->onDelete('cascade');
        });
        
        Schema::table('attendance',function(Blueprint $table){
            $table->foreign('studentId')->references('id')->on('student')->onDelete('cascade');
            $table->foreign('lessonId')->references('id')->on('lesson')->onDelete('cascade');
        });
        Schema::table('classes', function (Blueprint $table) {
            $table->foreign('courseId')->references('id')->on('course')->onDelete('cascade');
        });
        Schema::table('score', function (Blueprint $table) {
            $table->foreign('classId')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('studentId')->references('id')->on('student')->onDelete('cascade');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relationships');
    }
}
