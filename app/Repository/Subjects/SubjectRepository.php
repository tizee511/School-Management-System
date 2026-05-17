<?php

namespace App\Repository\Subjects;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use App\Repository\Subjects\SubjectRepositoryInterface;


class SubjectRepository implements SubjectRepositoryInterface
    {

    public function getAllSubjects ()
        {
        $Subjects = Subject::all ();
        return view ('Pages.Subjects.index', ['Subjects' => $Subjects]);
        }
    public function Create_Subjects ()
        {
        $Subject  = Subject::all ();
        $Gardes   = Grade::all ();
        $Teachers = Teacher::all ();
        return view ('Pages.Subjects.add', compact ('Subject', 'Gardes', 'Teachers'));
        }

    public function StoreSubjects ($request)
        {
        // return $request;
        try
            {
            $Subjects               = new Subject();
            $Subjects->Name         = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Subjects->Classroom_id = $request->Classroom_id;
            $Subjects->Grade_id     = $request->Grade_id;
            $Subjects->Teacher_id   = $request->Teacher_id;
            $Subjects->save ();
            toastr ()->success (trans ('messages.success'));
            return redirect ()->route ('subjects.index');
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
            }
        }
    public function editSubjects ($id)
        {
        $Subjects = Subject::findOrFail ($id);
        $Grades   = Grade::all ();
        $Teachers = Teacher::all ();
        return view ('Pages.Subjects.edit', compact ('Subjects', 'Grades', 'Teachers'));
        }
    public function UpdateSubjects ($request)
        {
        // return $request;
        try
            {
            $Subjects               = Subject::findOrFail ($request->id);
            $Subjects->Name         = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Subjects->Classroom_id = $request->Classroom_id;
            $Subjects->Grade_id     = $request->Grade_id;
            $Subjects->Teacher_id   = $request->Teacher_id;
            $Subjects->save ();
            toastr ()->success (trans ('messages.Update'));
            return redirect ()->route ('subjects.index');
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
            }
        }
    public function DeleteSubjects ($request)
        {
        try
            {
            Subject::destroy ($request->id);
            toastr ()->error (trans ('messages.Delete'));
            return redirect ()->back ();
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->withErrors (['error' => $e->getMessage ()]);
            }
        }
    }
