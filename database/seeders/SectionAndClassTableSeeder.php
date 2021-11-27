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
                        'name'=>'Nursery 1 Yellow','subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Nursery 1 Ash',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Nursery 1 Orange',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                        ],
                        [
                            'name'=>'Nursery 2 Yellow','subjects'=>[
                                'Mathematics', 
                                'English'
                            ]
                        ],
                        [
                            'name'=>'Nursery 2 Ash',
                            'subjects'=>[
                                "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                            ]
                        ],
                        [
                            'name'=>'Nursery 2 Orange',
                            'subjects'=>[
                                "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                            ]
                            ],
                            [
                                'name'=>'Nursery 3 Yellow','subjects'=>[
                                    "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                                ]
                            ],
                            [
                                'name'=>'Nursery 3 Ash',
                                'subjects'=>[
                                    "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                                ]
                            ],
                            [
                                'name'=>'Nursery 3 Orange',
                                'subjects'=>[
                                    "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                                ]
                            ]
                ]
            ],
            [
                'name'=>'Basic',
                'classes'=>[
                    [
                        'name'=>'Basic 1 yellow','subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 1 Ash',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 1 Orange',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 2 yellow','subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 2 Ash',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 2 Orange',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 3 yellow','subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 3 Ash',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'Basic 3 Orange',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                        ],
                        [
                            'name'=>'Basic 4 yellow','subjects'=>[
                                "Alqur'an",
                                "Mathematics",
                                "English Studies",
                                "basic Science and Technology",
                                "CCA",
                                "Handwriting",
                                "IRK",
                                "Al,azkar",
                                "Al-arabiyya",
                                "Al-huruf",
                                "Al-kitaba",
                                "Alhadith",
                                "Ulumul Amma",
                                "RNV",
                                "PVS",
                                "Hausa",
                            ]
                        ],
                        [
                            'name'=>'Basic 4 Ash',
                            'subjects'=>[
                                "Alqur'an",
                                "Mathematics",
                                "English Studies",
                                "basic Science and Technology",
                                "CCA",
                                "Handwriting",
                                "IRK",
                                "Al,azkar",
                                "Al-arabiyya",
                                "Al-huruf",
                                "Al-kitaba",
                                "Alhadith",
                                "Ulumul Amma",
                                "RNV",
                                "PVS",
                                "Hausa",
                            ]
                        ],
                        [
                            'name'=>'Basic 4 Orange',
                            'subjects'=>[
                                "Alqur'an",
                                "Mathematics",
                                "English Studies",
                                "basic Science and Technology",
                                "CCA",
                                "Handwriting",
                                "IRK",
                                "Al,azkar",
                                "Al-arabiyya",
                                "Al-huruf",
                                "Al-kitaba",
                                "Alhadith",
                                "Ulumul Amma",
                                "RNV",
                                "PVS",
                                "Hausa",
                            ]
                            ],
                            [
                                'name'=>'Basic 5 yellow','subjects'=>[
                                    "Alqur'an",
                                    "Mathematics",
                                    "English Studies",
                                    "basic Science and Technology",
                                    "CCA",
                                    "Handwriting",
                                    "IRK",
                                    "Al,azkar",
                                    "Al-arabiyya",
                                    "Al-huruf",
                                    "Al-kitaba",
                                    "Alhadith",
                                    "Ulumul Amma",
                                    "RNV",
                                    "PVS",
                                    "Hausa",
                                ]
                            ],
                            [
                                'name'=>'Basic 5 Ash',
                                'subjects'=>[
                                    "Alqur'an",
                                    "Mathematics",
                                    "English Studies",
                                    "basic Science and Technology",
                                    "CCA",
                                    "Handwriting",
                                    "IRK",
                                    "Al,azkar",
                                    "Al-arabiyya",
                                    "Al-huruf",
                                    "Al-kitaba",
                                    "Alhadith",
                                    "Ulumul Amma",
                                    "RNV",
                                    "PVS",
                                    "Hausa",
                                ]
                            ],
                            [
                                'name'=>'Basic 5 Orange',
                                'subjects'=>[
                                    "Alqur'an",
                                    "Mathematics",
                                    "English Studies",
                                    "basic Science and Technology",
                                    "CCA",
                                    "Handwriting",
                                    "IRK",
                                    "Al,azkar",
                                    "Al-arabiyya",
                                    "Al-huruf",
                                    "Al-kitaba",
                                    "Alhadith",
                                    "Ulumul Amma",
                                    "RNV",
                                    "PVS",
                                    "Hausa",
                                ]
                                ],
                                [
                                    'name'=>'Basic 6 yellow','subjects'=>[
                                        "Alqur'an",
                                        "Mathematics",
                                        "English Studies",
                                        "basic Science and Technology",
                                        "CCA",
                                        "Handwriting",
                                        "IRK",
                                        "Al,azkar",
                                        "Al-arabiyya",
                                        "Al-huruf",
                                        "Al-kitaba",
                                        "Alhadith",
                                        "Ulumul Amma",
                                        "RNV",
                                        "PVS",
                                        "Hausa",
                                    ]
                                ],
                                [
                                    'name'=>'Basic 6 Ash',
                                    'subjects'=>[
                                        "Alqur'an",
                                        "Mathematics",
                                        "English Studies",
                                        "basic Science and Technology",
                                        "CCA",
                                        "Handwriting",
                                        "IRK",
                                        "Al,azkar",
                                        "Al-arabiyya",
                                        "Al-huruf",
                                        "Al-kitaba",
                                        "Alhadith",
                                        "Ulumul Amma",
                                        "RNV",
                                        "PVS",
                                        "Hausa",
                                    ]
                                ],
                                [
                                    'name'=>'Basic 6 Orange',
                                    'subjects'=>[
                                        "Alqur'an",
                                        "Mathematics",
                                        "English Studies",
                                        "basic Science and Technology",
                                        "CCA",
                                        "Handwriting",
                                        "IRK",
                                        "Al,azkar",
                                        "Al-arabiyya",
                                        "Al-huruf",
                                        "Al-kitaba",
                                        "Alhadith",
                                        "Ulumul Amma",
                                        "RNV",
                                        "PVS",
                                        "Hausa",
                                    ]
                                ]
                ]
            ],
            [
                'name'=>'Secondary',
                'classes'=>[
                    [
                        'name'=>'JSS 1 Yellow',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                        ],
                    [
                        'name'=>'JSS 1 Ash',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
                        ]
                    ],
                    [
                        'name'=>'JSS 1 Orange',
                        'subjects'=>[
                            "Alqur'an",
                            "Mathematics",
                            "English Studies",
                            "basic Science and Technology",
                            "CCA",
                            "Handwriting",
                            "IRK",
                            "Al,azkar",
                            "Al-arabiyya",
                            "Al-huruf",
                            "Al-kitaba",
                            "Alhadith",
                            "Ulumul Amma",
                            "RNV",
                            "PVS",
                            "Hausa",
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
                    $newSubject->sectionClassSubjects()->create(['name'=>$newSubject->name,'section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
