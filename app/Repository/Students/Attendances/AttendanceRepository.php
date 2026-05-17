<?php


namespace App\Repository\Students\Attendances;


use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Teacher;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function index()
    {
        $Grades = Grade::with(['Sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('Pages.Attendances.Sections',compact('Grades','list_Grades','teachers'));
    }

    public function show($id)
    {
        $students = Student::with('Attendance')->where('Section_id',$id)->get();
        return view('Pages.Attendances.index',compact('students'));
    }

    public function store($request)
    {
        // dd($request);
        try {
            foreach ($request->attendences as $studentid => $attendence) {

                if( $attendence == 'presence' ) {
                    $attendence_status = true;
                } else if( $attendence == 'absent' ){
                    $attendence_status = false;
                }
                Attendance::create([
                    'Student_id'=> $studentid,
                    'Grade_id'=> $request->grade_id,
                    'Classroom_id'=> $request->classroom_id,
                    'Section_id'=> $request->section_id,
                    'Teacher_id'=> 1,
                    'attendance_date'=> date('Y-m-d'),
                    'attendance_status'=> $attendence_status
                ]);

            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}
