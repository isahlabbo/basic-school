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
                        'name'=>'Nursery one','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "Nursery Science",
                            "Handwriting",
                            "arabic",
                        ],
                        'code'=>'N',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery two','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "Nursery Science",
                            "Handwriting",
                            "arabic",
                        ],
                        'code'=>'N',
                        'year_sequence'=>'Second',
                    ],
                    
                    [
                        'name'=>'Nursery three','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "Nursery Science",
                            "Handwriting",
                            "arabic",
                        ],
                        'code'=>'N',
                        'year_sequence'=>'Third',
                    ],
                    
                ]
            ],
            [
                'name'=>'PRIMARY',
                'classes'=>[
                    [
                        'name'=>'PRIMARY ONE','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "basic Science and Technology",
                            "Handwriting",
                            "national value",
                            "arabic",
                            "hadith",
                        ],
                        'code'=>'P',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'PRIMARY TWO','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "basic Science and Technology",
                            "Handwriting",
                            "national value",
                            "arabic",
                            "hadith",
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'primary three','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "basic Science and Technology",
                            "Handwriting",
                            "national value",
                            "arabic",
                            "hadith",
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Third'
                    ],
                    [
                        'name'=>'primary four','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "basic Science and Technology",
                            "national value",
                            "arabic",
                            "hadith"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Forth'
                    ],

                    [
                        'name'=>'primary five','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "basic Science and Technology",
                            "national value",
                            "arabic",
                            "hadith"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Fifth'
                    ],
                    [
                        'name'=>'primary six','subjects'=>[
                            "qur'an",
                            "Mathematics",
                            "English",
                            "basic Science and Technology",
                            "national value",
                            "arabic",
                            "hadith"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Last'
                    ],
                ]
            ]  
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
                    $newSubject->sectionClassSubjects()->firstOrCreate(['name'=>strtoupper($newSubject->name),'section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
