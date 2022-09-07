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
        foreach (['ASH','GREEN','ORANGE','WHITE'] as $classGroup) {
            SectionClassGroup::firstOrCreate(['name'=>$classGroup]);
        }
    }
}
