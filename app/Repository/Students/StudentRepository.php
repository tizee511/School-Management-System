<?php

namespace App\Repository\Students;
use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use App\Repository\Students\StudentRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StudentRepository implements StudentRepositoryInterface {
        // Get All Students
        public function Get_Student()
        {

            $students = Student::all();
            return view('Pages.Students.index',compact('students'));
        }

          // Create Students
        public function Create_Student()
        {
    
            $data['Grade'] = Grade::all();
            $data['parents'] = MyParent::all();
            $data['Genders'] = Gender::all();
            $data['nationals'] = Nationalitie::all();
            $data['bloods'] = Type_Blood::all();
            return view('Pages.Students.add',$data);

        }
        //Get Classroomes
        public function Get_classrooms($id){

            $list_classes = Classroom::where("Grade_id", $id)->pluck("Name_class", "id");
            return $list_classes;
        }

        //Get Sections
        public function Get_Sections($id){

            $list_sections = Section::where("Class_id", $id)->pluck("Name_Section", "id");
            return $list_sections;
        }
        // Store Student
        public function Store_Student($request){

            try {
                $students = new Student();
                $students->Name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
                $students->Email_stud = $request->email;
                $students->password_stud = Hash::make($request->password_stud);
                $students->gender_id = $request->gender_id;
                $students->nationalitie_id = $request->nationalitie_id;
                $students->blood_id = $request->blood_id;
                $students->Date_Birth = $request->Date_Birth;
                $students->grade_id = $request->Grade_id;
                $students->Classroom_id = $request->Classroom_id;
                $students->section_id = $request->section_id;
                $students->parent_id = $request->parent_id;
                $students->academic_year = $request->academic_year;
                $students->save();
                // insert img
                if($request->hasfile('photos'))
                {
                    foreach($request->file('photos') as $file)
                    {
                        $file->storeAs('attachments/students/'.$students->Name, $file->getClientOriginalName(),'upload_attachments');

                        // insert in image_table
                        $images= new Image();
                        $images->filename=$file->getClientOriginalName();
                        $images->imageable_id= $students->id;
                        $images->imageable_type = 'App\Models\Student';
                        $images->save();
                    }
                }
                toastr()->success(trans('messages.success'));
                return redirect()->route('students.index');
            }

            catch (Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        }
        public function Show_Student($id){
            $Student = Student::find($id);
            return view('Pages.Students.show',compact('Student'));

        }
        // Edit Students 
        public function Edit_Student($id)
        {
            $Students =  Student::findOrFail($id);
            $data['Grades'] = Grade::all();
            $data['parents'] = MyParent::all();
            $data['Genders'] = Gender::all();
            $data['nationals'] = Nationalitie::all();
            $data['bloods'] = Type_Blood::all();
            return view('Pages.Students.edit',$data,compact('Students'));
        }

        // Update Student
        public function Update_Student($request)
        {
            try {
                $Edit_Students = Student::findorfail($request->id);
                $Edit_Students->Name = ['ar' => $request->Name_ar, 'en' => $request->Name_en];
                $Edit_Students->Email_stud = $request->email;
                $Edit_Students->password_stud = Hash::make($request->password_stud);
                $Edit_Students->gender_id = $request->gender_id;
                $Edit_Students->nationalitie_id = $request->nationalitie_id;
                $Edit_Students->blood_id = $request->blood_id;
                $Edit_Students->Date_Birth = $request->Date_Birth;
                $Edit_Students->grade_id = $request->Grade_id;
                $Edit_Students->Classroom_id = $request->Classroom_id;
                $Edit_Students->section_id = $request->section_id;
                $Edit_Students->parent_id = $request->parent_id;
                $Edit_Students->academic_year = $request->academic_year;
                $Edit_Students->save();
                toastr()->success(trans('messages.Update'));
                return redirect()->route('students.index');
            } catch (Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }

        // Delete Students
        public function Delete_Student($request)
        {

            Student::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->route('students.index');
        }

         public function Upload_attachment($request)
    {
        foreach($request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/students/'.$request->student_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new image();
            $images->filename=$name;
            $images->imageable_id = $request->student_id;
            $images->imageable_type = 'App\Models\Student';
            $images->save();
        }
        toastr()->success(trans('messages.success'));
        return redirect()->route('Students.show',$request->student_id);
    }
    public function Download_attachment($studentsname, $filename)
    {
        return response()->download(public_path('attachments/students/'.$studentsname.'/'.$filename));
    }

      public function Delete_attachment($request)
    {
        // Delete img in server disk
        Storage::disk('upload_attachments')->delete('attachments/students/'.$request->student_name.'/'.$request->filename);

        // Delete in data
        image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('Students.show',$request->student_id);
    }




}
