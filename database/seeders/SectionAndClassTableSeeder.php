<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionAndClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'name'=>'Nursery',
                'classes'=>['Nursery 1 yellow','Nursery 2 yellow','Nursery 3 yellow']
            ],
            [
                'name'=>'Basic',
                'classes'=>['Basic 1 yellow','Basic 2 yellow','Basic 3 yellow']
            ],
            [
                'name'=>'Secondary',
                'classes'=>['jss 1 yellow']
            ]
        ];
        foreach($sections as $section){
            $newSection = Section::firstOrCreate(['name'=>$section['name']]);
            foreach($section['classes'] as $class){
                $newSection->sectionClasses()->create(['name'=>$class]);
            }
        }
    }
}
