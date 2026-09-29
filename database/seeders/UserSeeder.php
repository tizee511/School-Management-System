<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // User::factory(10)->create();

    //     User::factory()->create([
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //     ]);
    // *==================================
        DB::table('users')->delete();
        
        User::create([
            'name'=> 'tizee',
            'email' => 'tizee511@gmail.com',
            'password'=>'12345678'
        ]);

    }
}
