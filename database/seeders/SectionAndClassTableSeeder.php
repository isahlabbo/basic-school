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
                        'name'=>'Nursery 1 A','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "SOCIAL HABIT",
                            "huruf"
                        ],
                        'code'=>'N'
                    ],
                    [
                        'name'=>'Nursery 1 B','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "SOCIAL HABIT",
                            "huruf"
                        ],
                        'code'=>'N'
                    ],
                    [
                        'name'=>'Nursery 2','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "SOCIAL HABIT",
                            "huruf"
                        ],
                        'code'=>'N'
                    ],
                    
                    
                ]
            ],
            [
                'name'=>'PRIMARY',
                'classes'=>[
                    [
                        'name'=>'PRIMARY 1','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "NATIONAL VALUE",
                            "huruf"
                        ],
                        'code'=>'P'
                    ],
                    [
                        'name'=>'PRIMARY 2','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "NATIONAL VALUE",
                            "huruf"
                        ],
                        'code'=>'P'
                    ],
                    [
                        'name'=>'PRIMARY 3','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "NATIONAL VALUE",
                            "huruf"
                        ],
                        'code'=>'P'
                    ],
                    [
                        'name'=>'PRIMARY 4','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "IRK",
                            "QIRA'AT",
                            "NATIONAL VALUE",
                            "huruf"
                        ],
                        'code'=>'P'
                    ],
                    
                ]
            ]
        ];
        foreach($sections as $section){
            $newSection = Section::firstOrCreate(['name'=>strtoupper($section['name'])]);
            foreach($section['classes'] as $class){
                $newClass = $newSection->sectionClasses()->firstOrCreate(['code'=>$class['code'],'name'=>strtoupper($class['name'])]);
                foreach($class['subjects'] as $subject){
                    $newSubject = Subject::firstOrCreate(['name'=>strtoupper($subject)]);
                    $newSubject->sectionClassSubjects()->create(['name'=>$newSubject->name,'section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
