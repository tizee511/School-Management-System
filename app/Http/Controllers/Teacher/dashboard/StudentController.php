<?php
namespace App\Http\Controllers\Teacher\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        // dd($ids);
        $students = Student::whereIn('section_id', $ids)->get();
        // return $students;
        return view('Pages.Teachers.dashboard.students.index', compact('students'));
    }

    public function sections()
    {
        $ids = DB::table('teacher_section')->where('teacher_id', auth()->user()->id)->pluck('section_id');
        $sections = Section::whereIn('id', $ids)->get();

        return view('Pages.Teachers.dashboard.sections.index', compact('sections'));
    }

    public function attendance(Request $request)
    {
        // return $request;
        try {
            $attenddate = date('Y-m-d');
            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendance_status = true;
                } else if ($attendence == 'absent') {
                    $attendance_status = false;
                }
                Attendance::updateOrCreate(['Student_id'=> $studentid],[
                    'Student_id' => $studentid,
                    'Grade_id' => $request->Grade_id,
                    'Classroom_id' => $request->Classroom_id,
                    'Section_id' => $request->Section_id,
                    'Teacher_id' => 1,
                    'attendance_date' => $attenddate,
                    'attendance_status' => $attendance_status
                ]);
            }
            toastr()->success(trans('messages.success'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function attendanceReport()
    {
        // return "Ok";
        $ids = DB::table ('teacher_section')->where ('teacher_id', auth ()->user ()->id)->pluck ('section_id');
        // dd($ids);
        $students = Student::whereIn ('section_id', $ids)->get();
        // dd($students);

        return view ('Pages.Teachers.dashboard.students.attendance_report', compact ('students'));
    }
    public function attendanceSearch (Request $request)
    {
// return $request;
        $request->validate ([
            'from' => 'required|date|date_format:Y-m-d',
            'to'   => 'required|date|date_format:Y-m-d|after_or_equal:from',
        ], [
            'to.after_or_equal' => 'تاريخ النهاية لابد ان اكبر من تاريخ البداية او يساويه',
            'from.date_format'  => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
            'to.date_format'    => 'صيغة التاريخ يجب ان تكون yyyy-mm-dd',
        ]);


        $ids      = DB::table ('teacher_section')->where ('teacher_id', auth ()->user ()->id)->pluck ('section_id');
        $students = Student::whereIn ('section_id', $ids)->get ();

        if ($request->student_id == 0)
        {

            $Students = Attendance::whereBetween ('attendance_date', [$request->from, $request->to])->get ();
            return view ('Pages.Teachers.dashboard.students.attendance_report', compact ('Students', 'students'));
        }
        else
        {

            $Students = Attendance::whereBetween ('attendance_date', [$request->from, $request->to])
                ->where ('Student_id', $request->student_id)->get ();
            return view ('Pages.Teachers.dashboard.students.attendance_report', compact ('Students', 'students'));


        }


    }

    public function Get_classrooms ($id)
        {
        $list_classes = Classroom::where ("Grade_id", $id)->pluck ("Name_class", "id");
        return $list_classes;
        }

    public function Get_Sections ($id)
    {

        $list_sections = Section::where ("Class_id", $id)->pluck ("Name_Section", "id");
        return $list_sections;
    }

}
