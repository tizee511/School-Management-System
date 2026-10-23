<?php

namespace App\Http\Controllers\Students\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quizze;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{

    public function index()
    {
        // return "ok";
        $quizzes = Quizze::where('Grade_id', auth()->user()->grade_id)
            ->where('Classroom_id', auth()->user()->Classroom_id)
            ->where('Section_id', auth()->user()->section_id)
            ->orderBy('id', 'DESC')
            ->get();
            // return $quizzes;
        return view('Pages.Students.dashboard.exams.index', compact('quizzes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($quizze_id)
    {
    //    return $quizze_id;
        $student_id = Auth::user()->id;
        // return $student_id->Name;
        return view('Pages.Students.dashboard.exams.show',compact('quizze_id','student_id'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
