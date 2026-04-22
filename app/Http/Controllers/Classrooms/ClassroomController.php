<?php

namespace App\Http\Controllers\Classrooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassroom;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;


class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     * @return 'My_Classes', 'Grades'
     */
    public function index()
    {
        // return "nnnn";
        $My_Classes = Classroom::all();
        $Grades = Grade::all();
        return view('Pages.My_Classes.My_Classes', compact('My_Classes', 'Grades'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {}
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(Request $request)
    {
        $List_Classes = $request->List_Classes;
        // $names = collect($request->List_Classes)->pluck('Name');
        // if ($names->duplicates()->isNotEmpty()) {
        //     return back()->withErrors([
        //         'Name' => 'يوجد أسماء فصول مكررة في نفس النموذج',
        //     ]);
        // }
        //
        // $this->validate($request,[
        //     'Name_class_en'=> 'required',
        //     'Name'=> 'required'
        // ],[
        //   'Name_class_en.required'=> trans('validation.required'),
        //   'Name.required'=> trans('validation.required'),
        // ]);
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
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {}
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $Classrooms = Classroom::findOrFail($request->id)->delete();
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
