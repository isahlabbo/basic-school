<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = ['Male','Female'];
        foreach ($genders as $gender) {
            Gender::firstOrCreate(['name'=>$gender]);
        }
    }
}
