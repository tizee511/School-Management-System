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

    public function create_promotions_students()
    {
        $promotions = promotion::all();
        return view('Pages.Students.promotions.management',compact('promotions'));
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
                        'academic_year'=>$request->academic_year_new,

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
                    'academic_year'=>$request->academic_year,
                    'academic_year_new'=>$request->academic_year_new,
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

    public function destroy_promotions($request)    
    {
        DB::beginTransaction();
        try {
            // التراجع عن الكل
            if($request->page_id ==1){

                $Promotions = Promotion::all();
                foreach ($Promotions as $Promotion){
                    //التحديث في جدول الطلاب
                    $ids = explode(',',$Promotion->Student_id);
                    student::whereIn('id', $ids)
                    ->update([
                        'grade_id'=>$Promotion->From_Grade,
                        'Classroom_id'=>$Promotion->From_Classroom,
                        'section_id'=> $Promotion->From_Section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);

                    //حذف جدول الترقيات
                    Promotion::truncate();
                }
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }else{
                // التراجع عن ترقية معينة
                $Promotion = Promotion::findorfail($request->id);
                student::where('id', $Promotion->Student_id)
                    ->update([
                        'grade_id'=>$Promotion->From_Grade,
                        'Classroom_id'=>$Promotion->From_Classroom,
                        'section_id'=> $Promotion->From_Section,
                        'academic_year'=>$Promotion->academic_year,
                    ]);
                Promotion::destroy($request->id);
                DB::commit();
                toastr()->error(trans('messages.Delete'));
                return redirect()->back();
            }
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}

