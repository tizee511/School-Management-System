<?php

namespace Database\Seeders;

use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religionist;
use App\Models\Type_Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MyParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('my_parents')->delete();

        $nationalities = Nationalitie::all();
        $blood_types = Type_Blood::all();
        $religions = Religionist::all();

        MyParent::create([
            'email' => 'parent@example.com',
            'password' => Hash::make('12345678'),

            // معلومات الأب
            'Name_Father' => ['en' => 'Mohamed Ali', 'ar' => 'محمد علي'],
            'National_ID_Father' => '1234567890',
            'Passport_ID_Father' => 'A12345678',
            'Phone_Father' => '01012345678',
            'Job_Father' => ['en' => 'Engineer', 'ar' => 'مهندس'],
            'Nationality_Father_id' => $nationalities->first()->id ?? 1,
            'Blood_Type_Father_id' => $blood_types->first()->id ?? 1,
            'Religion_Father_id' => $religions->first()->id ?? 1,
            'Address_Father' => 'Cairo, Egypt',

            // معلومات الأم
            'Name_Mother' => ['en' => 'Fatma Ahmed', 'ar' => 'فاطمة أحمد'],
            'National_ID_Mother' => '2234567890',
            'Passport_ID_Mother' => 'B12345678',
            'Phone_Mother' => '01112345678',
            'Job_Mother' => ['en' => 'Doctor', 'ar' => 'طبيبة'],
            'Nationality_Mother_id' => $nationalities->first()->id ?? 1,
            'Blood_Type_Mother_id' => $blood_types->first()->id ?? 1,
            'Religion_Mother_id' => $religions->first()->id ?? 1,
            'Address_Mother' => 'Cairo, Egypt',
        ]);
    }
}
