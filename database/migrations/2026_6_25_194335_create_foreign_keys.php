<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
        //The Relationship Between Table Grades & Classrooms
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->foreign('Grade_id')->references('id')->on('grades')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        // --------------------------------------------------------------------------------
        //The Relationship Between Table Grades & Sections
        Schema::table('sections', function(Blueprint $table) {
            $table->foreign('Grade_id')->references('id')->on('grades')
                ->onDelete('cascade')->onUpdate('cascade');
        });
        // --------------------------------------------------------------------------------
        //The Relationship Between The Table My_parents & Tables nationalities,type__bloods,religionists
                    // Relationship With Columns The Father
// Relationship With Columns The Mother
        Schema::table('my_parents', function(Blueprint $table) {
            $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Father_id')->references('id')->on('religionists');
            $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');
            $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            $table->foreign('Religion_Mother_id')->references('id')->on('religionists');
        });
        // --------------------------------------------------------------------------------
        //The Relationship Between Table parent_attachments & My_parents
        Schema::table('parent_attachments', function (Blueprint $table) {
            $table->foreign('parent_id')->references('id')->on('my_parents');
        });
        // --------------------------------------------------------------------------------
        //The Relationship Between Table teachers & specializations,genders
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('Specialization_id')->references('id')->on('specializations')->onDelete('cascade');     
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('cascade');
        });
    }

	public function down()
	{
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->dropForeign('Classrooms_Grade_id_foreign');
		});
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_Grade_id_foreign');
        });
        Schema::table('sections', function(Blueprint $table) {
            $table->dropForeign('sections_Class_id_foreign');
        });
	}
}
