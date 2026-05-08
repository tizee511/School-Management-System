<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;


class ClassroomController extends Controller
{
    public function index()
    {
        $My_Classes = Classroom::paginate(10)->all();
        $Grades = Grade::all();
        return view('Pages.My_Classes.My_Classes', compact('My_Classes', 'Grades'));
    }

    public function store(Request $request)
    {
        $List_Classes = $request->List_Classes;
        try {
            // $validated = $request->validated();
            foreach ($List_Classes as $List_Class) {
                Classroom::create([
                    'Name_class' => [
                        'ar' => $List_Class['Name'],
                        'en' => $List_Class['Name_class_en'],
                    ],
                    'Grade_id' => $List_Class['Grade_id'],
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update(Request $request)
    {
        try {
            // $validated = $request->validated();
            $Classrooms = Classroom::findOrFail($request->id);
            $Classrooms->update([
                $Classrooms->Name_class = ['ar' => $request->Name, 'en' => $request->Name_en,],
                $Classrooms->Grade_id = $request->Grade_id,
            ]);
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Classrooms.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        Classroom::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }
    public function delete_all(Request $request)
    {
        $delete_all_id = explode(",", $request->delete_all_id);
        Classroom::whereIn('id', $delete_all_id)->Delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Classrooms.index');
    }
    public function Filter_Classes(Request $request)
    {
        $Grades = Grade::all();
        $Search = Classroom::select('*')->where('Grade_id', '=', $request->Grade_id)->Get();
        return view('pages.My_Classes.My_Classes', compact('Grades', 'Search'));
    }
}
