<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SectionClassGroup;
use App\Models\Section;
use App\Events\SectionCreated;

class SectionClassGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['BLUE','GREEN','RED','YELLOW'] as $classGroup) {
            SectionClassGroup::firstOrCreate(['name'=>$classGroup]);
        }

        $section = Section::create(['name'=>'Nursery','duration'=>3,'level'=>1]);
        event(new SectionCreated($section));
    }
}
