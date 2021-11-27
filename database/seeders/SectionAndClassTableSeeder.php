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
                            'Mathematics', 
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Nursery 1 Ash',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Nursery 1 Orange',
                        'subjects'=>[
                            'Mathematics',
                            'English'
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
                                'Mathematics',
                                'English'
                            ]
                        ],
                        [
                            'name'=>'Nursery 2 Orange',
                            'subjects'=>[
                                'Mathematics',
                                'English'
                            ]
                            ],
                            [
                                'name'=>'Nursery 3 Yellow','subjects'=>[
                                    'Mathematics', 
                                    'English'
                                ]
                            ],
                            [
                                'name'=>'Nursery 3 Ash',
                                'subjects'=>[
                                    'Mathematics',
                                    'English'
                                ]
                            ],
                            [
                                'name'=>'Nursery 3 Orange',
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
                        'name'=>'Basic 1 Ash',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 1 Orange',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 2 yellow','subjects'=>[
                            'Mathematics', 
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 2 Ash',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 2 Orange',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 3 yellow','subjects'=>[
                            'Mathematics', 
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 3 Ash',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'Basic 3 Orange',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                        ],
                        [
                            'name'=>'Basic 4 yellow','subjects'=>[
                                'Mathematics', 
                                'English'
                            ]
                        ],
                        [
                            'name'=>'Basic 4 Ash',
                            'subjects'=>[
                                'Mathematics',
                                'English'
                            ]
                        ],
                        [
                            'name'=>'Basic 4 Orange',
                            'subjects'=>[
                                'Mathematics',
                                'English'
                            ]
                            ],
                            [
                                'name'=>'Basic 5 yellow','subjects'=>[
                                    'Mathematics', 
                                    'English'
                                ]
                            ],
                            [
                                'name'=>'Basic 5 Ash',
                                'subjects'=>[
                                    'Mathematics',
                                    'English'
                                ]
                            ],
                            [
                                'name'=>'Basic 5 Orange',
                                'subjects'=>[
                                    'Mathematics',
                                    'English'
                                ]
                                ],
                                [
                                    'name'=>'Basic 6 yellow','subjects'=>[
                                        'Mathematics', 
                                        'English'
                                    ]
                                ],
                                [
                                    'name'=>'Basic 6 Ash',
                                    'subjects'=>[
                                        'Mathematics',
                                        'English'
                                    ]
                                ],
                                [
                                    'name'=>'Basic 6 Orange',
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
                        'name'=>'JSS 1 Yellow',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                        ],
                    [
                        'name'=>'JSS 1 Ash',
                        'subjects'=>[
                            'Mathematics',
                            'English'
                        ]
                    ],
                    [
                        'name'=>'JSS 1 Orange',
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
                    $newSubject->sectionClassSubjects()->create(['name'=>$newSubject->name,'section_class_id'=>$newClass->id]);
                }
            }
        }
    }
}
