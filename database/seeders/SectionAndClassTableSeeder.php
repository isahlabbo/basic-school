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
                        'name'=>'Nursery one A','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "social habit",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'NA',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery one B','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "social habit",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'NB',
                        'year_sequence'=>'First',
                    ],
                    
                    [
                        'name'=>'Nursery two','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "social habit",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'NA',
                        'year_sequence'=>'Second',
                    ],
                    
                ]
            ],
            [
                'name'=>'PRIMARY',
                'classes'=>[
                    [
                        'name'=>'PRIMARY ONE','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "national value",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'PRIMARY TWO','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "national value",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'primary three','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "national value",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'Third'
                    ],
                    [
                        'name'=>'primary four','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "national value",
                            "IRK",
                            "huruf",
                            "qira'at",
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'Forth'
                    ],
                    
                ]
            ],
            
        ];
        foreach($sections as $section){
            $newSection = Section::firstOrCreate(['name'=>strtoupper($section['name'])]);
            foreach($section['classes'] as $class){
                $newClass = $newSection->sectionClasses()->firstOrCreate([
                    'code'=>$class['code'],'name'=>strtoupper($class['name']),
                    'year_sequence'=>$class['year_sequence']
                    ]);
                foreach($class['subjects'] as $subject){
                    $newSubject = Subject::firstOrCreate(['name'=>strtoupper($subject)]);
                    $newSubject->sectionClassSubjects()->create(['name'=>strtoupper($newSubject->name),'section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
