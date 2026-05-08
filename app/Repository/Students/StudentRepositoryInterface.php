<?php

namespace App\Repository\Students;

interface StudentRepositoryInterface{

    // get all Students
    public function Get_Student();

    // Create Student
    public function Create_Student();
 
    // Store Students
    public function Store_Student($request);

    // Show_Student
    public function Show_Student($id);

    // Get classrooms
    public function Get_classrooms($id);
    
    // Get Sections
    public function Get_Sections($id);

    // Edit Students
    public function Edit_Student($id);

    // Update Students
    public function Update_Student($request);

    // Delete Student
    public function Delete_Student($request);
    public function Upload_attachment($id);
    public function Download_attachment($studentsname,$filename);
    
    public function Delete_attachment($request);

}


