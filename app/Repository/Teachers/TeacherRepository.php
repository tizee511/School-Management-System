<?php

namespace App\Repository\Teachers;
use App\Models\Gender;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Teacher;
use App\Repository\Teachers\TeacherRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements TeacherRepositoryInterface{

    public function getAllTeachers(){
        $Teachers = Teacher::all();
        return view('Pages.Teachers.teacher',compact('Teachers'));

    }
    public function Create_Teachers()
    {
        $date['Specialization'] = specialization::all();
        $date['Gender'] = Gender::all();
        $date['sections'] = Section::all();
        return view('Pages.Teachers.create',$date);

    }
    // public function Getspecialization(){
    //     return specialization::all();
    // }
    // public function GetGender(){
    //     return Gender::all();
    // }
    // public function GetSection(){
    //     return Section::all();
    // }
    public function StoreTeachers($request){

    try {
            $Teachers = new Teacher();
            $Teachers->email = $request->email;
            $Teachers->password =  Hash::make($request->password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            $Teachers->save();
            $Teachers->Sections()->attach($request->section_id);
            toastr()->success(trans('messages.success'));
            return redirect()->route('teacher.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function editTeachers($id)
    {
        
        $teacher = Teacher::findOrFail($id);
        $date['specializations'] = specialization::all();
        $date['genders'] = Gender::all();
        $date['sections'] = Section::all();
        return view('Pages.Teachers.Edit',$date,['Teachers'=>$teacher]);
    }
    public function UpdateTeachers($request)
    {
        try {
            $Teachers = Teacher::findOrFail($request->id);
            $Teachers->email = $request->email;
            $Teachers->password =  Hash::make($request->password);
            $Teachers->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $Teachers->Specialization_id = $request->Specialization_id;
            $Teachers->Gender_id = $request->Gender_id;
            $Teachers->Joining_Date = $request->Joining_Date;
            $Teachers->Address = $request->Address;
            if(isset($request->section_id)){
                $Teachers->Sections()->sync($request->section_id);
            }else{
                $Teachers->Sections()->sync(array());
            }
            $Teachers->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('teacher.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function DeleteTeachers($request)
    {
        Teacher::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('teacher.index');
    }
}
