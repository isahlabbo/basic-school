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
        $subjects =[
            "Islamic Religious Studies",
            "Mathematics",
            "English Studies",
            "Nursery Science",
            "Writing",
            "Al-Quar'an",
            "Al-Adhkaar",
            "Al-Arabiyyah",
            "Al-Huruuf",
            "Al-Kitabah",
            "Basic Science And Technology",
            "Religion and National Value",
            "Hausa",
            "Business Studies",
            "Pre-vocational Studies",
            "Computer",
            "At-tahdheeb",
            "Al-Qiraah",
            "An-Nahw",
            "Al-Tajweed",
            "Al-khatt"
        ];
        
        foreach($subjects as $subject){
            {
                $newSubject = Subject::firstOrCreate(['name'=>strtoupper($subject)]);
            }
        }
    }
}
