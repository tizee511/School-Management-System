<?php

namespace App\Http\Controllers\Students\Quizzes;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Quizze;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{
    public function index()
    {
        $quizzes = Quizze::get();
        return view('Pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        $teachers = Teacher::all();
        return view('Pages.Quizzes.create', compact('grades','subjects','teachers'));
    }

    public function store(Request $request)
    {
        // return $request;
        try {

            $quizzes = new Quizze();
            $quizzes->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->Subject_id = $request->subject_id;
            $quizzes->Grade_id = $request->Grade_id;
            $quizzes->Classroom_id = $request->Classroom_id;
            $quizzes->Section_id = $request->section_id;
            $quizzes->Teacher_id = $request->teacher_id;
            $quizzes->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('quizzes.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('Pages.Quizzes.edit', $data, compact('quizz'));
    }

    public function update(Request $request)
    {
        // return $request;
        try {
            $quizz = Quizze::findorFail($request->id);
            $quizz->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->Subject_id = $request->subject_id;
            $quizz->Grade_id = $request->Grade_id;
            $quizz->Classroom_id = $request->Classroom_id;
            $quizz->Section_id = $request->section_id;
            $quizz->Teacher_id = $request->teacher_id;
            $quizz->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Quizze::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
