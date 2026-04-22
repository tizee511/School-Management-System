<?php

namespace App\Http\Controllers\Section;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "mmmmmmmmmmmmmmm";
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        return view('Pages.Sections.Sections', compact('Grades','list_Grades'));
        // return $Grades;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
    try {
        Section::create([
            'Name_Section'=> ['ar'=>$request->Name_Section_Ar,'en'=> $request->Name_Section_En],
            'Grade_id'=>$request->Grade_id,
            'Class_id'=>$request->Class_id,
            'Status' => 1
        ]);
        toastr()->success(trans('messages.success'));
        return redirect()->route('Sections.index');

    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $Sections = Section::findOrFail($request->id);
            $Status = (isset($request->Status))? $Sections->Status = 1 : $Sections->Status = 2;
            // return $Sections;
            $Sections->update([
                'Name_Section' => ['ar'=>$request->Name_Section_Ar,'en'=> $request->Name_Section_En],
                'Grade_id'=>$request->Grade_id,
                'Class_id'=>$request->Class_id,
                'Status' => $Status
                
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('Sections.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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
