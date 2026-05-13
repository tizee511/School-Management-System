<?php
namespace App\Repository\Students\Fees;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Student;
use App\Repository\Students\Fees\FeesRepositoryInterface;

class FeesRepository implements FeesRepositoryInterface
{
    public function Get_all_Fees()
    {
        // return  "nnnnnnnnnnnnnnnnnn";
        $fees = Fee::all();
        $Grades = Grade::all();
        return view('Pages.Fees.index',compact('fees','Grades'));
        
    }

    public function create_fee()
    {
        $Grades = Grade::all();
        return view('Pages.Fees.add',compact('Grades'));
    }
        
    public function Fees_Edit($id){

            $fee = Fee::findorfail($id);
            $Grades = Grade::all();
            return view('Pages.Fees.edit',compact('fee','Grades'));

    }
  
    public function store_fees($request)
    {
        try {
            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->Grade_id  =$request->Grade_id;
            $fees->Classroom_id  =$request->Classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->Fee_type  =$request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('fees.index');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    public function Update_Fees($request)
    {
        try {
            $fees = Fee::findorfail($request->id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount =$request->amount;
            $fees->Grade_id =$request->Grade_id;
            $fees->Classroom_id =$request->Classroom_id;
            $fees->description =$request->description;
            $fees->year =$request->year;
            $fees->Fee_type =$request->Fee_type;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('fees.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
            
    public function Destroy_Fee($request)
    {
        try {
            Fee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}

