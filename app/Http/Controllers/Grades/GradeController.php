<?php

namespace App\Http\Controllers\Grades;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrades;
use App\Models\Grade;
use App\Models\Classroom;
use Exception;
use Illuminate\Http\Request;


class GradeController extends Controller
{
    public function index()
    {
        $Grades = Grade::all();
        return view('Pages.Grades.Grades', compact('Grades'));
    }

    public function create() {}

    public function store(StoreGrades $request)
    {
        // if (Grade::where('Name->ar', $request->Name)->orWhere('Name->en', $request->Name_en)->exists()) {
        //     return redirect()->back()->withErrors(trans('Grades_trans.exists'));
        // }
        try {
            $validated = $request->validated();
            $Grades = new Grade;
            $Grades->Name = ['en' => $request->Name_en, 'ar' => $request->Name];
            $Grades->Notes = $request->Notes;
            $Grades->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Grades.index');
        } catch (Exception $e) {
            return \redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Grade $grade) {}

    public function edit(Grade $grade) {}

    public function update(StoreGrades $request)
    {
        // return $request;
        try {
            $validated = $request->validated();
            $Grades = Grade::findOrfail($request->id);
            $Grades->update([
                $Grades->Name = ['en' => $request->Name_en, 'ar' => $request->Name],
                $Grades->Notes = $request->Notes
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Grades.index');
        } catch (Exception $e) {
            return \redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $My_Classes = Classroom::where('Grade_id', $request->id)->pluck('Grade_id');
        if ($My_Classes->count() == 0) {
            Grade::findOrfail($request->id)->Delete();
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('Grades.index');
        } else {
            toastr()->error(trans('Grades_trans.delete_Grade_Error'));
            return redirect()->route('Grades.index');
        }
    }
}
