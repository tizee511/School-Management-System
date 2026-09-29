<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->delete();

        $sections = Section::all();
        $parents = MyParent::all();
        $genders = Gender::all();
        $nationalities = Nationalitie::all();
        $blood_types = Type_Blood::all();

        if ($sections->isEmpty() || $parents->isEmpty()) {
            return;
        }

        $students_data = [
            ['en' => 'Omar Ahmed', 'ar' => 'عمر أحمد'],
            ['en' => 'Zaid Ali', 'ar' => 'زيد علي'],
            ['en' => 'Sara Mohamed', 'ar' => 'سارة محمد'],
            ['en' => 'Laila Hassan', 'ar' => 'ليلى حسن'],
            ['en' => 'Youssef Ibrahim', 'ar' => 'يوسف إبراهيم'],
        ];

        foreach ($students_data as $index => $name) {
            $section = $sections->random();
        
            Student::create([
                'Name' => $name,
                'email' => 'student' . ($index + 1) . '@example.com',
                'password' => Hash::make('12345678'),
                'gender_id' => $genders->random()->id,
                'nationalitie_id' => $nationalities->random()->id,
                'blood_id' => $blood_types->random()->id,
                'Date_Birth' => '2015-05-20',
                'grade_id' => $section->Grade_id,
                'Classroom_id' => $section->Class_id,
                'section_id' => $section->id,
                'parent_id' => $parents->random()->id,
                'academic_year' => '2026',
            ]);
        }
    }
}
