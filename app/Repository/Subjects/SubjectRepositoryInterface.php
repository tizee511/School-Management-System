<?php

namespace App\Repository\Subjects;

interface SubjectRepositoryInterface{

    // get all Subjects
    public function getAllSubjects();

    // Create Subjects
    public function Create_Subjects();

    // StoreSubjects
    public function StoreSubjects($request);

    // StoreSubjects
    public function editSubjects($id);

    // UpdateSubjects
    public function UpdateSubjects($request);

    // Delete Subjects
    public function DeleteSubjects($request);
}


