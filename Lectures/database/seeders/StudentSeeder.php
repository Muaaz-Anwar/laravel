<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Faker\Core\File;

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

        // $student = collect([[
        //     "name"=> "Seeder user 1",
        //     "email"=> "1Seederemail@gmail.com"
        // ],[
        //     "name"=> "Seeder user 2",
        //     "email"=> "2Seederemail@gmail.com",
        // ],[
        //     "name"=> "Seeder user 3",
        //     "email"=> "3Seederemail@gmail.com",
        // ]]);
        // $student->each(function ($student) {
        //     student::insert($student);
        // });

        // $json = file_get_contents(base_path("database/json/students.json"));
        // $student = collect(json_decode($json));

        // $student->each(function ($student) {
        //     student::create([
        //         "name" => $student->name,
        //         "email" => $student->email
        //     ]);
        // });

        for ($i = 0; $i < 10; $i++) {
            student::create([
                "name" => fake()->name(),
                "email" => fake()->unique()->email()
            ]);
        }
    }
}
