<?php

namespace Database\Seeders;

use App\Models\Religionist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religionists')->delete();

         $religions = [

            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم'
            ],
            [
                'en'=> 'Christian',
                'ar'=> 'مسيحي'
            ],
            [
                'en'=> 'Other',
                'ar'=> 'غيرذلك'
            ],

        ];

        foreach ($religions as $R) {
            Religionist::create(['rel_name' => $R]);
        }


    }
}
