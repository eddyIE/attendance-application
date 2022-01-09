<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
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
            'phone' => $this -> faker -> phoneNumber,
            'parent_phone' => $this -> faker -> phoneNumber,
            'address' => $this -> faker -> address,
            'gender' => $this -> faker -> numberBetween($min = 0, $max = 1),
            'birthdate' => $this -> faker -> dateTimeBetween('2001-01-01', '2001-12-31'),
            'class_id' => '61d5a3b8b0755',                      //put class id here
            'created_by' => 'admin',
            'created_at' => now(),
            'full_txt_search' => null
        ];
    }
}
