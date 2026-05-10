<?php

namespace App\Http\Controllers\Section;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SectionController extends Controller
{
    public function index()
    {
        // selected Teachers all Stationed in a Section 
        // $section = Section::findOrFail(8);
        // return $section->Teachers;
        // *------------------------------
        // selected Teachers all Stationed in a Section 
        // $teachers = Teacher::findOrFail(7);
        // return $teachers->Sections;
        // *-----------------------------
        // return "mmmmmmmmmmmmmmm";
        $Grades = Grade::with('Sections')->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('Pages.Sections.Sections',
        compact('Grades','list_Grades','teachers'
        ));
        // return $Grades;
    }
    public function store(Request $request)
    {
        // return $request->teacher_id;
        try {
            $section = new Section();
            $section->Name_Section =['ar'=>$request->Name_Section_Ar,'en'=> $request->Name_Section_En]; 
            $section->Grade_id =$request->Grade_id; 
            $section->Class_id =$request->Class_id; 
            $section->Status =1; 
            $section->save();
            $section->Teachers()->attach($request->teacher_id);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Sections.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $Sections = Section::findOrFail($request->id);
            $Sections->Name_Section =['ar'=>$request->Name_Section_Ar,'en'=> $request->Name_Section_En];
            $Sections->Grade_id = $request->Grade_id ;
            $Sections->Class_id = $request->Class_id;
            $Sections->Status = (isset($request->Status))? $Sections->Status = 1 : $Sections->Status = 2;
            if(isset($request->teacher_id)){
                $Sections->Teachers()->sync($request->teacher_id);
            }else{
                $Sections->Teachers()->sync(array());
            }
            $Sections->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Sections.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    public function destroy( Request $request)
    {
        Section::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Sections.index');
    }

    public function getclasses($id)
    {
        $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_class", "id");
        return $list_classes;
    }
}
