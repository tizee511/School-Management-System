<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('settings')->delete();

        $data = [
            ['Key' => 'current_session', 'Value' => '2025-2026'],
            ['Key' => 'school_title', 'Value' => 'MS'],
            ['Key' => 'school_name', 'Value' => 'Atizee Soft International Schools'],
            ['Key' => 'end_first_term', 'Value' => '01-12-2025'],
            ['Key' => 'end_second_term', 'Value' => '01-03-2026'],
            ['Key' => 'phone', 'Value' => '784392285'],
            ['Key' => 'address', 'Value' => 'اليمن'],
            ['Key' => 'school_email', 'Value' => 'nashwangaid@atizee.com'],
            ['Key' => 'logo', 'Value' => 'assets/images/1704992327666.jpg'],
        ];

        DB::table('settings')->insert($data);
    
    }
}
