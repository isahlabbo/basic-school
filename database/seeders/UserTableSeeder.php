<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SectionClassSubject;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'Admin',
                'email'=>'admin@'.str_replace(' ','',strtolower(config('app.name'))).'.com',
                'password'=>Hash::make('admin'),
                'role'=>'Admin',
            ],
        ];

        foreach($users as $user){
            $user = User::firstOrCreate($user);

            if($user->role == 'Teacher'){
                $user->teacher()->firstOrCreate(['address'=>config('app.name'),'phone'=>'08000000000']);
            }
        }

        for ($i=1; $i <=16 ; $i++) { 
            $user = User::firstOrCreate([
                'name'=>'teacher '.$i,
                'email'=>'teacher'.$i.'@'.str_replace(' ','',strtolower(config('app.name'))).'.com',
                'password'=>Hash::make('teacher'),
                'role'=>'Teacher',
            ],);

            $teacher = $user->teacher()->firstOrCreate(['address'=>config('app.name'),'phone'=>'08162463010'.$i]);
            
        }

        foreach(SectionClassSubject::all() as $classSubject){
            $classSubject->sectionClassSubjectTeachers()->firstOrCreate(['teacher_id'=>rand(1,16)]);
        }
        
    }
}
