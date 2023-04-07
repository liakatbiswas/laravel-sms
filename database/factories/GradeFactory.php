<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory {
 /**
  * Define the model's default state.
  *
  * @return array<string, mixed>
  */
 public function definition() {
  return [
   'name'      => $this->faker->words( 3, true ),
   'course_id' => Course::all()->random()->id,
  ];
 }
}