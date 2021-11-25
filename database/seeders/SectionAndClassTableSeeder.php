<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Subject;

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
                'classes'=>[
                    [
                        'name'=>'Nursery 1 yellow','subjects'=>[
                            'Mathematics', 
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Nursery 1 yellow',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Nursery 1 yellow',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ]
                ]
            ],
            [
                'name'=>'Basic',
                'classes'=>[
                    [
                        'name'=>'Basic 1 yellow','subjects'=>[
                            'Mathematics', 
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 1 yellow',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 1 yellow',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ]
                ]
            ],
            [
                'name'=>'Secondary',
                'classes'=>[
                    [
                        'name'=>'Basic 1 yellow',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ]
                ]
            ]
        ];
        foreach($sections as $section){
            $newSection = Section::firstOrCreate(['name'=>$section['name']]);
            foreach($section['classes'] as $class){
                $newClass = $newSection->sectionClasses()->create(['name'=>$class['name']]);
                foreach($class['subjects'] as $subject){
                    $newSubject = Subject::firstOrCreate(['name'=>$subject]);
                    $newSubject->sectionClassSubjects()->create(['section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
