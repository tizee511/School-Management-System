<?php

namespace Database\Seeders;

use App\Models\Gender;
use App\Models\Section;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->delete();

        $specializations = Specialization::all();
        $genders = Gender::all();
        $sections = Section::all();

        $teachers = [
            [
                'Name' => ['en' => 'Ahmed Mohamed', 'ar' => 'أحمد محمد'],
                'Email' => 'ahmed@example.com',
                'Password' => Hash::make('12345678'),
                'Specialization_id' => $specializations->first()->id, // Just take first if name matching is tricky
                'Gender_id' => $genders->where('Name_gend', 'Male')->first()->id ?? $genders->first()->id,
                'Joining_Date' => date('Y-m-d'),
                'Address' => 'Cairo, Egypt',
            ],
            [
                'Name' => ['en' => 'Mona Ali', 'ar' => 'منى علي'],
                'Email' => 'mona@example.com',
                'Password' => Hash::make('12345678'),
                'Specialization_id' => $specializations->last()->id,
                'Gender_id' => $genders->where('Name_gend', 'Female')->first()->id ?? $genders->last()->id,
                'Joining_Date' => date('Y-m-d'),
                'Address' => 'Giza, Egypt',
            ],
        ];

        foreach ($teachers as $t) {
            $teacher = Teacher::create([
                'Name' => $t['Name'],
                'Email' => $t['Email'],
                'Password' => $t['Password'],
                'Specialization_id' => $t['Specialization_id'],
                'Gender_id' => $t['Gender_id'],
                'Joining_Date' => $t['Joining_Date'],
                'Address' => $t['Address'],
            ]);

            // ربط المعلم بأقسام عشوائية (مثلاً قسمين لكل معلم)
            if ($sections->count() > 0) {
                $teacher->Sections()->attach(
                    $sections->random(min(3, $sections->count()))->pluck('id')->toArray()
                );
            }
        }
    }
}
