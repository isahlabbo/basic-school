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
                        'name'=>'Nursery one orange','subjects'=>[
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
                        'code'=>'NO',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery one ash','subjects'=>[
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
                        'code'=>'NA',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery one green','subjects'=>[
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
                        'code'=>'NG',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery one white','subjects'=>[
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
                        'code'=>'NW',
                        'year_sequence'=>'First',
                    ],
                    [
                        'name'=>'Nursery two ash','subjects'=>[
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
                        'code'=>'NA',
                        'year_sequence'=>'Second',
                    ],
                    [
                        'name'=>'Nursery two green','subjects'=>[
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
                        'code'=>'NG',
                        'year_sequence'=>'Second',
                    ],
                    [
                        'name'=>'Nursery two orange','subjects'=>[
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
                        'code'=>'NO',
                        'year_sequence'=>'Second',
                    ],
                    [
                        'name'=>'Nursery three ash','subjects'=>[
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
                        'code'=>'NA',
                        'year_sequence'=>'Third',
                    ],
                    [
                        'name'=>'Nursery three orange','subjects'=>[
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
                        'code'=>'NO',
                        'year_sequence'=>'Third',
                    ],
                    [
                        'name'=>'Nursery three green','subjects'=>[
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
                        'code'=>'NG',
                        'year_sequence'=>'Third',
                    ],
                ]
            ],
            [
                'name'=>'BASIC',
                'classes'=>[
                    [
                        'name'=>'BASIC ONE ASH','subjects'=>[
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
                        'code'=>'BA',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'BASIC ONE orange','subjects'=>[
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
                        'code'=>'BO',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'BASIC ONE GREEN','subjects'=>[
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
                        'code'=>'BG',
                        'year_sequence'=>'First'
                    ],
                    [
                        'name'=>'BASIC TWO ASH','subjects'=>[
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
                        'code'=>'BA',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'BASIC TWO orange','subjects'=>[
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
                        'code'=>'BO',
                        'year_sequence'=>'Second'
                    ],
                    [
                        'name'=>'BASIC three ASH','subjects'=>[
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
                        'code'=>'BA',
                        'year_sequence'=>'Third'
                    ],
                    [
                        'name'=>'BASIC three orange','subjects'=>[
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
                        'code'=>'BO',
                        'year_sequence'=>'Third'
                    ],
                    [
                        'name'=>'BASIC FOUR ORANGE','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "Handwriting",
                            "PRE-VOCATIONAL STUDIES",
                            "CULTURAL AND CREATIVE ART",
                            "IRK",
                            "AL-HADITH",
                            "AL-KHATHU",
                            "AL-ARABIYYA",
                            "AL-AZKAR"
                        ],
                        'code'=>'BO',
                        'year_sequence'=>'Forth'
                    ],
                    [
                        'name'=>'BASIC five ORANGE','subjects'=>[
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
                            "PRE-VOCATIONAL STUDIES",
                            "AL-AZKAR"
                        ],
                        'code'=>'BO',
                        'year_sequence'=>'Fifth'
                    ],
                ]
            ],
            [
                'name'=>'SECONDARY',
                'classes'=>[
                    [
                        'name'=>'JSS1','subjects'=>[
                            "AL-qur'an",
                            "Mathematics",
                            "English Studies",
                            "PRE-VOCATIONAL STUDIES",
                            "NATIONAL VALUE",
                            "HAUSA",
                            "ISLAMIC RELIGION STUDIES",
                            "HISTORY",
                            "BUSINESS STUDIES",
                            "BASIC SCIENCE AND TECHNOLOGY",
                            "AS-SIRAH",
                            "CULTURAL AND CREATIVE ART",
                            "AL-FIQHA",
                            "AT-TAJWEED",
                            "AL-TAUHEED",
                            
                        ],
                        'code'=>'SJ',
                        'year_sequence'=>'First'
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
                    $newSubject->sectionClassSubjects()->create(['name'=>strtoupper($newSubject->name),'section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
