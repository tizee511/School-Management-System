<?php
namespace App\Repository\Students\Graduated;
use App\Models\Grade;
use App\Models\Student;
use App\Repository\Students\Graduated\StudentGraduatedRepositoryInterface;

class StudentGraduatedRepository implements StudentGraduatedRepositoryInterface
{
    public function Get_graduated_students ()
    {
        // return  "nnnnnnnnnnnnnnnnnn";
        $students = Student::onlyTrashed()->get();
        return view ('Pages.Students.Graduated.index', compact ('students'));
    }

    public function create_graduated_student ()
    {
        $Grades = Grade::all();
        return view ('Pages.Students.Graduated.create', compact ('Grades'));
    }
    public function SoftDelete ($request)
    {
        $students = student::where ('grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

        if ($students->count () < 1)
        {
            return redirect()->back()->with('error_Graduated', __('لاتوجد بيانات في جدول الطلاب'));
        }

        foreach ($students as $student)
        {
            $ids = explode(',', $student->id);
            student::whereIn('id',$ids)->Delete ();
        }

        toastr ()->success (trans ('messages.success'));
        return redirect ()->route ('Graduate.index');
    }

    public function ReturnData ($request)
    {
        student::onlyTrashed ()->where ('id', $request->id)->first()->restore ();
        toastr ()->success (trans ('messages.success'));
        return redirect ()->back ();
    }

    public function destroy ($request)
    {
        student::onlyTrashed ()->where ('id', $request->id)->first ()->forceDelete ();
        toastr ()->error (trans ('messages.Delete'));
        return redirect ()->back ();
    }

}

