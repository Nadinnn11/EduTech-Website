<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    User::create([
        'name' => 'Admin',
        'email' => 'admin@example.com',
        'password' => bcrypt('password'),
        'role' => 'admin',
        'style' => 'serius'
    ]);
    
    // Student
    $student = User::create([
        'name' => 'Student',
        'email' => 'student@example.com',
        'password' => bcrypt('password'),
        'role' => 'student',
        'style' => 'santai'
    ]);
    
    // Course + enroll
    $course = Course::create([
        'title' => 'Laravel Advanced',
        'description' => 'Belajar Laravel',
        'created_by' => 1 // admin
    ]);
    
    $student->enrolledCourses()->attach($course);
}

}
