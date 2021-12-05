<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicSession;

class AcademicSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sessions = [
            '2021/2022',
            '2022/2023',
            '2023/2024',
            '2024/2025',
            '2025/2026',
            '2026/2027',
            '2027/2028',
            '2028/2029',
            '2029/2030'
        ];

        foreach ($sessions as $session) {
            $academicSession = AcademicSession::firstOrCreate(['name'=>$session]);
            if($academicSession->id == 1){
                $academicSession->update(['status'=>'Active']);
            }
            foreach ([1,2,3] as $term_id) {
               $academicSession->academicSessionTerms()->create(['term_id'=>$term_id]);
            }
        }
    }
}
