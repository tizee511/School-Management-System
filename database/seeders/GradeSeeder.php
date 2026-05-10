<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();

        $grades = [
            ['en' => 'Primary Stage', 'ar' => 'المرحلة الابتدائية', 'Notes' => 'مرحلة التعليم الأساسي للأطفال من سن 6 إلى 12 سنة'],
            ['en' => 'Middle Stage', 'ar' => 'المرحلة الاعدادية', 'Notes' => 'مرحلة متوسطة تلي المرحلة الابتدائية وتهتم بتطوير المهارات الأكاديمية'],
            ['en' => 'High School', 'ar' => 'المرحلة الثانوية', 'Notes' => 'مرحلة تعليمية نهائية تهدف لتأهيل الطلاب للتعليم الجامعي'],
        ];

        foreach($grades as $grade){
            Grade::create([
                'Name' => ['en' => $grade['en'], 'ar' => $grade['ar']],
                'Notes' => $grade['Notes']
            ]);
        }
    }
}
