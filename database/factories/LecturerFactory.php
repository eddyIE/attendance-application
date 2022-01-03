<?php

namespace Database\Factories;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Factories\Factory;

class LecturerFactory extends Factory
{
    protected $model = Lecturer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => uniqid(),
            'name' => $this -> faker -> name,
            'title' => $this -> faker -> randomElement(['Instructor', 'Assistant Professor', 'Associate Professor', 'Professor']),
            'phone' => $this -> faker -> phoneNumber,
            'address' => $this -> faker -> address,
            'gender' => $this -> faker -> numberBetween($min = 0, $max = 1),
            'username' => $this -> faker -> userName,
            'password' => md5('123456'),
            'role' => '0',
            'created_by' => 'admin',
            'created_at' => now()
        ];
    }
}
