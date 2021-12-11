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
                            "Mathematics",
                            "English",
                            "Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "Azkar",
                            "arbiyya",
                            "kitabba",
                            "huruf",
                        ],
                        'code'=>'N',
                        'year_sequence'=>'First',
                    ],
                    
                    [
                        'name'=>'Nursery two','subjects'=>[
                            "Mathematics",
                            "English",
                            "Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "Azkar",
                            "arbiyya",
                            "kitabba",
                            "huruf",
                        ],
                        'code'=>'N',
                        'year_sequence'=>'Second',
                    ],
                    
                    [
                        'name'=>'Nursery three','subjects'=>[
                            "Mathematics",
                            "English",
                            "Science",
                            "Handwriting",
                            "IRK",
                            "qur'An",
                            "Azkar",
                            "arbiyya",
                            "kitabba",
                            "huruf",
                            "hadith",
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
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'PRIMARY TWO','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'primary three','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Third'
                    ],
                    [
                        'name'=>'primary four','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'forth'
                    ],
                    [
                        'name'=>'PRIMARY FIVE','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'PRIMARY SIX','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'P',
                        'year_sequence'=>'Last'
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
