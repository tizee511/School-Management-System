<?php

namespace App\Http\Controllers\Students\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quizze;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::get();
        return view('Pages.Questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::all();
        return view('Pages.Questions.create', compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        try
        {
            $questions               = new Question();
            $questions->Title         = $request->title;
            $questions->Answers   = $request->answers;
            $questions->Right_answer     = $request->right_answer;
            $questions->Quizze_id = $request->quizze_id;
            $questions->Score   = $request->score;
            $questions->save ();
            toastr ()->success (trans ('messages.success'));
            return redirect ()->route ('Questions.index');
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
        }
    }

    public function show(string $id)
    {
        
    }
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $quizzes = Quizze::all();
        // dd($question);
        return view ('Pages.Questions.edit', compact ('question','quizzes'));
    }

    public function update(Request $request)
    {
        // return $request;
        try
            {
            $question            = Question::findOrFail($request->id);
            $question->Answers      = $request->answers;
            $question->Title        = $request->title;
            $question->Right_answer = $request->right_answer;
            $question->Quizze_id    = $request->quizze_id;
            $question->Score        = $request->score;
            $question->save ();
            toastr ()->success (trans ('messages.Update'));
            return redirect ()->route ('Questions.index');
            }
        catch (\Exception $e)
            {
            return redirect ()->back ()->with (['error' => $e->getMessage ()]);
            }
    }

    public function destroy(Request $request)
    {
        try
        {
            Question::destroy ($request->id);
            toastr ()->error (trans ('messages.Delete'));
            return redirect ()->back ();
        }
        catch (\Exception $e)
        {
            return redirect ()->back ()->withErrors (['error' => $e->getMessage ()]);
        }
    }
}
