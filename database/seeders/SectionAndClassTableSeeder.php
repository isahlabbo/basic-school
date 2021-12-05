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
                        'name'=>'Nursery one a','subjects'=>[
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "social habit",
                            "huruf",
                        ],
                        'code'=>'NA',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery one B','subjects'=>[
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "social habit",
                            "huruf",
                        ],
                        'code'=>'NB',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery TWO A','subjects'=>[
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "social habit",
                            "huruf",
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
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "NATIONAL VALUE",
                            "huruf"              
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'PRIMARY TWO','subjects'=>[
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "NATIONAL VALUE",
                            "huruf"              
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'PRIMARY three','subjects'=>[
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "NATIONAL VALUE",
                            "huruf"              
                        ],
                        'code'=>'PA',
                        'year_sequence'=>'Third'
                    ],
                    [
                        'name'=>'PRIMARY four','subjects'=>[
                            "Mathematics",
                            "English",
                            "basic Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "qira'at",
                            "NATIONAL VALUE",
                            "huruf"              
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
