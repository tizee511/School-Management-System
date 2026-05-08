<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          // clear  of Found Database 
        DB::table('specializations')->delete();

        $specialization = [
            ['en'=>'Arabic','ar'=>'عربي'],
            ['en'=>'Sciences','ar'=>'علوم'],
            ['en'=>'English ','ar'=>'انجليزي'],
            ['en'=>'Computer','ar'=>'حاسب الي']
        ];

        foreach($specialization as $spec){
            Specialization::create(['Name_spec'=>$spec]);
        }
    }
}
