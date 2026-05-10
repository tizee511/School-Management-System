<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GradeSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BloodTableSeeder::class);
        $this->call(NationalitieSeeder::class);
        $this->call(ReligionistsSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(MyParentSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
