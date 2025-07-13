<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // student::create([
        //     "name"=> "Seeder user",
        //     "email"=> "Seederemail@gmail.com",
        // ]);

        $student = collect([[
            "name"=> "Seeder user 1",
            "email"=> "1Seederemail@gmail.com"
        ],[
            "name"=> "Seeder user 2",
            "email"=> "2Seederemail@gmail.com",
        ],[
            "name"=> "Seeder user 3",
            "email"=> "3Seederemail@gmail.com",
        ]]);

        $student->each(function ($student) {
            student::insert($student);
        });
        // student::create([
        //     "name"=> "Seeder user",
        //     "email"=> "Seederemail@gmail.com",
        // ]);
    }
}
