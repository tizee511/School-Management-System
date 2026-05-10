<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Classrooms')->delete();

        $grades = Grade::all();
        
        $primary_id = $grades->where('Name', 'Primary Stage')->first()->id ?? null;
        $middle_id = $grades->where('Name', 'Middle Stage')->first()->id ?? null;
        $high_id = $grades->where('Name', 'High School')->first()->id ?? null;

        if (!$primary_id || !$middle_id || !$high_id) {
            // Fallback to IDs if names don't match (e.g. if locale is different)
            // Or use database query for JSON
            $primary_id = Grade::where('Name->en', 'Primary Stage')->first()->id;
            $middle_id = Grade::where('Name->en', 'Middle Stage')->first()->id;
            $high_id = Grade::where('Name->en', 'High School')->first()->id;
        }

        $classrooms = [
            // Primary Stage
            ['Name_class' => ['en' => 'First Grade', 'ar' => 'الصف الأول'], 'Grade_id' => $primary_id],
            ['Name_class' => ['en' => 'Second Grade', 'ar' => 'الصف الثاني'], 'Grade_id' => $primary_id],
            ['Name_class' => ['en' => 'Third Grade', 'ar' => 'الصف الثالث'], 'Grade_id' => $primary_id],
            ['Name_class' => ['en' => 'Fourth Grade', 'ar' => 'الصف الرابع'], 'Grade_id' => $primary_id],
            ['Name_class' => ['en' => 'Fifth Grade', 'ar' => 'الصف الخامس'], 'Grade_id' => $primary_id],


            
            // Middle Stage
            ['Name_class' => ['en' => 'Sixth Grade', 'ar' => 'الصف السادس'], 'Grade_id' => $middle_id],
            ['Name_class' => ['en' => 'Seventh Grade', 'ar' => 'الصف السابع'], 'Grade_id' => $middle_id],
            ['Name_class' => ['en' => 'Eighth Grade', 'ar' => 'الصف الثامن'], 'Grade_id' => $middle_id],
            ['Name_class' => ['en' => 'Ninth Grade', 'ar' => 'الصف التاسع'], 'Grade_id' => $middle_id],

            // High School
            ['Name_class' => ['en' => 'First Secondary', 'ar' => 'الأول الثانوي'], 'Grade_id' => $high_id],
            ['Name_class' => ['en' => 'Second Secondary', 'ar' => 'الثاني الثانوي'], 'Grade_id' => $high_id],
            ['Name_class' => ['en' => 'Third Secondary', 'ar' => 'الثالث الثانوي'], 'Grade_id' => $high_id],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::create([
                'Name_class' => $classroom['Name_class'],
                'Grade_id' => $classroom['Grade_id']
            ]);
        }
    }
}
