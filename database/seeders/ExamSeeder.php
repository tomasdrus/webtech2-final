<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * selecting, pairing
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        /* Selecting question */
        DB::table('questions')->insert([
            'name' => $faker->sentence(10, true),
            'type' => 'selecting',
        ]);
        foreach (range(1,5) as $index) {
	        DB::table('options')->insert([
	            'answer' => $faker->sentence(5, true),
	            'rightness' => $index == 1 ? true : false,
	            'question_id' => 1,
	        ]);
	    } 

        /* Pairing question */
        DB::table('questions')->insert([
            'name' => $faker->sentence(10, true),
            'type' => 'pairing',
        ]);
        foreach (range(1,5) as $index) {
            DB::table('pairs')->insert([
                'option' => $faker->sentence(6, true),
                'answer' => $faker->sentence(3, true),
                'question_id' => 2,
            ]);
        } 

        /* Other questions */
        foreach (range(1,7) as $index) {
	        DB::table('questions')->insert([
	            'name' => $faker->sentence(10, true),
	            'type' => $faker->randomElement(['classical', 'drawing', 'mathematical']),
	        ]);
	    }
        $questions = DB::table('questions')->where('type', 'classical')->pluck('id');
   	    foreach ($questions as $index) {
	        DB::table('options')->insert([
	            'answer' => $faker->sentence(5, true),
	            'rightness' => true,
	            'question_id' => $index,
	        ]);
	    }

        /* Exams */
        foreach (range(1,3) as $indexExam){
            DB::table('exams')->insert([
                'name' => $faker->sentence(10, true),
                'token' => $faker->unique()->lexify('?????'),
                'length' => $faker->numberBetween(15, 90),
                'active' => false,
            ]);

            $questions = DB::table('questions')->pluck('id');
            $faker = Faker::create();
            foreach (range(1, $faker->numberBetween(3, 7)) as $index) {
                DB::table('exam_questions')->insert([
                    'exam_id' => $indexExam,
                    'question_id' => $faker->unique()->randomElement($questions),
                ]);
            }
        }
    }
}
