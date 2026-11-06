<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
        //*The Relationship Between Table Grades & Classrooms
		Schema::table('Classrooms', function(Blueprint $table) {
			$table->foreignId('Grade_id')->constrained('grades','id')->cascadeOnDelete()->cascadeOnUpdate();
		});
        //? --------------------------------------------------------------------------------
        // The Relationship Between Table Grades & Sections
        Schema::table('sections', function(Blueprint $table) {

            $table->foreignId ('Grade_id')->constrained ('grades', 'id')->cascadeOnDelete ();
            $table->foreign ('Class_id')->references('id')->on('Classrooms')->cascadeOnDelete ();
            // ! Code Old
            // $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');

        });
        //? --------------------------------------------------------------------------------
        //The Relationship Between The Table My_parents & Tables nationalities,type__bloods,religionists
                    // Relationship With Columns The Father
        // Relationship With Columns The Mother
        Schema::table('my_parents', function(Blueprint $table) {
            //* The Relationship Father
            $table->foreignId ('Nationality_Father_id')->constrained ('nationalities', 'id')->cascadeOnDelete ();
            $table->foreignId ('Blood_Type_Father_id')->constrained ('type__bloods', 'id')->cascadeOnDelete ();
            $table->foreignId ('Religion_Father_id')->constrained ('religionists', 'id')->cascadeOnDelete ();
            $table->foreignId ('Nationality_Mother_id')->constrained ('nationalities', 'id')->cascadeOnDelete ();
            // ! Code Old
            // $table->foreign('Nationality_Father_id')->references('id')->on('nationalities');
            // $table->foreign('Blood_Type_Father_id')->references('id')->on('type__bloods');
            // $table->foreign('Religion_Father_id')->references('id')->on('religionists');
            // $table->foreign('Nationality_Mother_id')->references('id')->on('nationalities');

            //* The Relationship Mother
            $table->foreignId ('Blood_Type_Mother_id')->constrained ('type__bloods', 'id')->cascadeOnDelete ();
            $table->foreignId ('Religion_Mother_id')->constrained ('religionists', 'id')->cascadeOnDelete ();

            // ! Code Old
            // $table->foreign('Blood_Type_Mother_id')->references('id')->on('type__bloods');
            // $table->foreign('Religion_Mother_id')->references('id')->on('religionists');

        });
        // ?--------------------------------------------------------------------------------
        //*The Relationship Between Table parent_attachments & My_parents
        Schema::table('parent_attachments', function (Blueprint $table) {
            $table->foreignId ('parent_id')->constrained ('my_parents', 'id')->cascadeOnDelete ();
            // ! Code Old
            // $table->foreign('parent_id')->references('id')->on('my_parents');

        });
        // ?--------------------------------------------------------------------------------
        //The Relationship Between Table teachers & specializations,genders
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreignId ('Specialization_id')->constrained ('specializations', 'id')->cascadeOnDelete ();
            $table->foreignId ('Gender_id')->constrained ('genders', 'id')->cascadeOnDelete ();
        });
        //? ----------------------------------------------------------------------------------------------------------------
        //*The Relationship Between Table students & nationalities,genders,type__bloods,grades,sections,Classrooms,my_parents
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId ('gender_id')->constrained('genders')->cascadeOnDelete ();
            $table->foreignId ('nationalitie_id')->references ('id')->on ('nationalities')->cascadeOnDelete ();
            $table->foreignId ('blood_id')->references ('id')->on ('type__bloods')->cascadeOnDelete ();
            $table->foreignId ('grade_id')->constrained ('grades', 'id')->cascadeOnDelete ()->cascadeOnUpdate ();
            $table->foreignId ('Classroom_id')->constrained ('Classrooms', 'id')->cascadeOnDelete ()->cascadeOnUpdate ();
            $table->foreignId ('section_id')->constrained ('sections', 'id')->cascadeOnDelete ()->cascadeOnUpdate ();
            $table->foreignId ('parent_id')->references ('id')->on ('my_parents')->cascadeOnDelete ()->cascadeOnUpdate ();
        });

        //* The Relationship Between Table promotions & students,sections,Classrooms,genders
        // Schema::create('promotions', function (Blueprint $table) {
        //     $table->foreignId('Student_id')->constrained('students','id')->cascadeOnDelete();
        //     $table->foreignId('From_Grade')->constrained('grades','id')->cascadeOnDelete();
        //     $table->foreignId('To_Grade')->constrained('grades','id')->cascadeOnDelete();
        //     $table->foreignId('From_Classroom')->constrained('Classrooms','id')->cascadeOnDelete();
        //     $table->foreignId('To_Classroom')->constrained('Classrooms','id')->cascadeOnDelete();
        //     $table->foreignId('From_Section')->constrained('sections','id')->cascadeOnDelete();
        //     $table->foreignId('To_Section')->constrained('sections','id')->cascadeOnDelete();
        // });

        // *The Relationship Between Table Fees & Classrooms,genders
        Schema::table ('fees', function (Blueprint $table)
        {
            $table->foreignId ('Grade_id')->constrained ('grades', 'id')->cascadeOnDelete ()->cascadeOnUpdate ();
            $table->foreignId ('Classroom_id')->constrained ('Classrooms', 'id')->cascadeOnDelete ()->cascadeOnUpdate ();
        
        });
        
        // *The Relationship Between Table fees_invoices & students, Classrooms,genders,fees
        // Schema::create ('fees_invoices', function (Blueprint $table)
        // {
        //     $table->foreignId ('Student_id')->constrained ('students', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Grade_id')->constrained ('grades', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Classroom_id')->references ('id')->on ('Classrooms')->cascadeOnDelete ();
        //     $table->foreignId ('Fee_id')->references ('id')->on ('fees')->cascadeOnDelete ();
        // });

        // *The Relationship Between Table receipt_students & students
        // Schema::create ('receipt_students', function (Blueprint $table)
        // {
        //     $table->foreignId ('Student_id')->constrained ('students', 'id')->cascadeOnDelete ();
        // });
        
        // *The Relationship Between Table processing_fees & students
        // Schema::create ('processing_fees', function (Blueprint $table)
        // {
        //     $table->foreignId ('Student_id')->constrained ('students', 'id')->cascadeOnDelete ();
        // });
        
        // *The Relationship Between Table payment_students & students
        // Schema::create ('payment_students', function (Blueprint $table)
        // {
        //     $table->foreignId ('Student_id')->constrained ('students', 'id')->cascadeOnDelete ();
        // });

        // *The Relationship Between Table attendances & students,sections,Classrooms,genders,teachers
        // Schema::create ('attendances', function (Blueprint $table)
        // {
        //     $table->foreignId ('Student_id')->constrained ('students', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Grade_id')->constrained ('grades', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Classroom_id')->constrained ('Classrooms', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Section_id')->references ('id')->on ('sections')->cascadeOnDelete ();
        //     $table->foreignId ('Teacher_id')->references ('id')->on ('teachers')->cascadeOnDelete ();
        // });

        // *The Relationship Between Table student_accounts & fees_invoices,receipt_students,processing_fees,payment_students,students
        // Schema::create ('student_accounts', function (Blueprint $table)
        // {
        //     $table->foreignId ('fee_invoice_id')->nullable ()->constrained('fees_invoices' , 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Receipt_id')->nullable ()->constrained ('receipt_students','id')->cascadeOnDelete ();
        //     $table->foreignId ('processing_fee_id')->nullable ()->constrained('processing_fees','id')->cascadeOnDelete ();
        //     $table->foreignId ('Payment_id')->nullable ()->constrained('payment_students','id')->cascadeOnDelete ();
        //     $table->foreignId ('Student_id')->constrained('students','id')->cascadeOnDelete ();
        // });

        // *The Relationship Between Table fund_accounts & receipt_students,payment_students
        // Schema::create ('fund_accounts', function (Blueprint $table)
        // {
        //     $table->foreignId ('Receipt_id')->nullable ()->constrained ('receipt_students','id')->cascadeOnDelete ();
        //     $table->foreignId ('Payment_id')->nullable ()->constrained('payment_students','id')->cascadeOnDelete ();
        // });

        // *The Relationship Between Table subjects & Classrooms,genders,teachers
        // Schema::create ('subjects', function (Blueprint $table)
        // {
        //     $table->foreignId ('Grade_id')->constrained('grades', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Classroom_id')->constrained('classrooms', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Teacher_id')->constrained('teachers','id')->cascadeOnDelete ();
        // });
        // *The Relationship Between Table online_classes & Classrooms,genders,sections,users
        // Schema::create ('online_classes', function (Blueprint $table)
        // {
        //     $table->foreignId ('Grade_id')->constrained('grades', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Classroom_id')->constrained('classrooms', 'id')->cascadeOnDelete ();
        //     $table->foreignId ('Section_id')->references ('id')->on ('sections')->cascadeOnDelete ();
        //     $table->foreignId ('user_id')->references ('id')->on ('users')->cascadeOnDelete ();
        // });




    

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
