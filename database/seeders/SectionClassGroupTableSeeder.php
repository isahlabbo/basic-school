<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionClassGroup;

class SectionClassGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['A','B','C','D'] as $classGroup) {
            SectionClassGroup::firstOrCreate(['name'=>$classGroup]);
        }
    }
}
