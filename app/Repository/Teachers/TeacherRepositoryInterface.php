<?php

namespace App\Repository\Teachers;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();

    // Create Teachers
        public function Create_Teachers();

   
    public function StoreTeachers($request);

    // StoreTeachers
    public function editTeachers($id);

    // UpdateTeachers
    public function UpdateTeachers($request);

    // DeleteTeachers
    public function DeleteTeachers($request);

}


