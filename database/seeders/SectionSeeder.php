<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->delete();

        $classrooms = Classroom::all();

        foreach ($classrooms as $classroom) {
            $sections = [
                ['en' => 'Section A', 'ar' => 'قسم أ'],
                ['en' => 'Section B', 'ar' => 'قسم ب'],
            ];

            foreach ($sections as $section) {
                Section::create([
                    'Name_Section' => $section,
                    'Status' => 1,
                    'Grade_id' => $classroom->Grade_id,
                    'Class_id' => $classroom->id,
                ]);
            }
        }
    }
}
