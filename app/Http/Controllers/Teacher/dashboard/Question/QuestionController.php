<?php

namespace App\Http\Controllers\Teacher\dashboard\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quizze;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        try
        {
            $questions               = new Question();
            $questions->Title         = $request->title;
            $questions->Answers   = $request->answers;
            $questions->Right_answer     = $request->right_answer;
            $questions->Quizze_id = $request->quizz_id;
            $questions->Score   = $request->score;
            $questions->save ();
            toastr ()->success (trans ('messages.success'));
            return redirect ()->back();
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
        }
    }

    public function show($id)
    {
        $quizz_id = $id;
        return view('Pages.Teachers.dashboard.Questions.create',compact('quizz_id'));
    }
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quizze::all();
        // dd($question);
        return view ('Pages.Teachers.dashboard.Questions.edit', compact ('question','quizzes'));
    }

    public function update(Request $request,$id)
    {
        // return $request;

        try
        {
            $question            = Question::findOrFail($id);
            $question->Title        = $request->title;
            $question->Answers      = $request->answers;
            $question->Right_answer = $request->right_answer;
            $question->Score        = $request->score;
            $question->save ();
            toastr ()->success (trans ('messages.Update'));
            return redirect ()->back();
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
        }
    }

    public function destroy($id)
    {
        try
        {
            Question::destroy ($id);
            toastr ()->error (trans ('messages.Delete'));
            return redirect ()->back ();
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->withErrors (['error' => $e->getMessage ()]);
        }
    }
}
