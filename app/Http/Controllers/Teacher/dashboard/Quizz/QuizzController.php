<?php

namespace App\Http\Controllers\Teacher\dashboard\Quizz;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
   
    public function index()
    {
        // return "ok";
        $quizzes = Quizze::where ('teacher_id', auth ()->user ()->id)->get ();
        // dd($quizzes);
        return view ('Pages.Teachers.dashboard.Quizzes.index', compact ('quizzes'));

        }

   
    public function create()
    {
        // return "create";

        $data['grades']   = Grade::all ();
        $data['subjects'] = Subject::where ('teacher_id', auth ()->user ()->id)->get ();
        return view ('Pages.Teachers.dashboard.Quizzes.create', $data);
    }


    public function store(Request $request)
    {
        // return $request;

        try
            {

            $quizzes               = new Quizze();
            $quizzes->Name         = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->Subject_id   = $request->subject_id;
            $quizzes->Grade_id     = $request->Grade_id;
            $quizzes->Classroom_id = $request->Classroom_id;
            $quizzes->Section_id   = $request->section_id;
            $quizzes->teacher_id   = auth ()->user ()->id;
            $quizzes->save ();
            toastr ()->success (trans ('messages.success'));
            return redirect ()->route ('teacherQuizzes.index');
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
            }
    }


    public function show($id)
    {
        // return "show :".$id;

        $questions = Question::where ('quizze_id', $id)->get ();
        // return $questions;
        $quizz     = Quizze::findorFail ($id);
        return view ('Pages.Teachers.dashboard.Questions.index', compact ('questions', 'quizz'));
    }


    public function edit( $id)
    {
        // return "edit".$id;
        $quizz            = Quizze::findorFail ($id);
        $data['grades']   = Grade::all ();
        $data['subjects'] = Subject::all ();
        $data['teachers'] = Teacher::all ();
        return view ('Pages.Teachers.dashboard.Quizzes.edit', $data, compact ('quizz'));
    }

    public function update(Request $request)
    {
        // return $request;
        try
            {
            $quizz               = Quizze::findorFail ($request->id);
            $quizz->Name         = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->Subject_id   = $request->subject_id;
            $quizz->Grade_id     = $request->Grade_id;
            $quizz->Classroom_id = $request->Classroom_id;
            $quizz->Section_id   = $request->section_id;
            $quizz->Teacher_id   = auth ()->user ()->id;
            $quizz->save ();
            toastr ()->success (trans ('messages.Update'));
            return redirect ()->route ('teacherQuizzes.index');
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
            }
    }

    public function destroy( $id)
    {
        // return "destroy:".$id;
        try
            {
            Quizze::destroy ($id);
            toastr ()->error (trans ('messages.Delete'));
            return redirect ()->back ();
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->withErrors (['error' => $e->getMessage ()]);
            }
    }

    public function student_quizze ($quizze_id)
        {
        // $degrees = Degree::where ('quizze_id', $quizze_id)->get ();
        // return view ('pages.Teachers.dashboard.Quizzes.student_quizze', compact ('degrees'));
        }
    
    public function repeat_quizze(Request $request)
    {
        // Degree::where('student_id', $request->student_id)->where('quizze_id', $request->quizze_id)->delete();
        // toastr()->success('تم فتح الاختبار مرة اخرى للطالب');
    }


}
