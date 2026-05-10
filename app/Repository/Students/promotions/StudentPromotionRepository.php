<?php

namespace App\Repository\Students\promotions;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface {

    public function Get_promotions(){
     // echo "nnnnnnnnnnnnnnnnnn";

      $Grades = Grade::all();
      // dd($Grades);
      return view('Pages.Students.promotions.index',compact('Grades'));
    }
     public function Store_promotions($request)
    {
        DB::beginTransaction();
        try {

            $students = Student::where('grade_id',$request->Grade_id)->where('Classroom_id',$request->Classroom_id)->where('section_id',$request->section_id)->get();

            if($students->count() < 1){
                return redirect()->back()->with('error_promotions', __('لاتوجد بيانات في جدول الطلاب'));
            }
            // update in table student
            foreach ($students as $student)
            {
                $ids = explode(',',$student->id);
                Student::whereIn('id', $ids)
                    ->update([
                        'grade_id'=>$request->Grade_id_new,
                        'Classroom_id'=>$request->Classroom_id_new,
                        'section_id'=>$request->section_id_new,
                    ]);

                // insert in to promotions
                Promotion::updateOrCreate([
                    'Student_id'=>$student->id,
                    'From_Grade'=>$request->Grade_id,
                    'From_Classroom'=>$request->Classroom_id,
                    'From_Section'=>$request->section_id,
                    'To_Grade'=>$request->Grade_id_new,
                    'To_Classroom'=>$request->Classroom_id_new,
                    'To_Section'=>$request->section_id_new,
                ]);
            }
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

}

