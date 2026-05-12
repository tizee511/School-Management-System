<?php
namespace App\Repository\Students\Graduated;

interface StudentGraduatedRepositoryInterface
{
    // Get_graduated_students
    public function Get_graduated_students();

    // Create Graduated Studente
    public function create_graduated_student();

    public function SoftDelete($request);
    

    public function ReturnData ($request);


    public function destroy ($request);

    // // Create promotions
    // public function create_promotions_students();
    // // Delete promotions
    // public function destroy_promotions($request);

}
