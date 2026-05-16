<?php


namespace App\Repository\Students\Processing_Fees;


use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\DB;

class ProcessingFeeRepository implements ProcessingFeeRepositoryInterface
{

    public function index()
    {
        $ProcessingFees = ProcessingFee::all();
        return view('Pages.Process_Fee.index',compact('ProcessingFees'));
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('Pages.Process_Fee.add',compact('student'));
    }

    public function edit($id)
    {
        $ProcessingFee = ProcessingFee::findorfail($id);
        return view('Pages.Process_Fee.edit',compact('ProcessingFee'));
    }

    public function store($request)
    {
        DB::beginTransaction();

        try {
            // حفظ البيانات في جدول معالجة الرسوم
            $ProcessingFee = new ProcessingFee();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->Student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();


            // حفظ البيانات في جدول حساب الطلاب
            $students_accounts = new StudentAccount();
            $students_accounts->Invoice_date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->Student_id = $request->student_id;
            $students_accounts->processing_fee_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->Credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('processing_fees.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // تعديل البيانات في جدول معالجة الرسوم
            $ProcessingFee = ProcessingFee::findorfail($request->id);;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->Student_id = $request->student_id;
            $ProcessingFee->amount = $request->Debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            // تعديل البيانات في جدول حساب الطلاب
            $students_accounts = StudentAccount::where('processing_fee_id',$request->id)->first();;
            $students_accounts->Invoice_date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->Student_id = $request->student_id;
            $students_accounts->processing_fee_id = $ProcessingFee->id;
            $students_accounts->Debit = 0.00;
            $students_accounts->Credit = $request->Debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();


            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('processing_fees.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ProcessingFee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
