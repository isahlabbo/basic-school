<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
                'email'=>'admin@wayforward.com',
                'password'=>Hash::make('admin'),
                'role'=>'Admin',
            ],
            [
                'name'=>'Teacher',
                'email'=>'teacher@wayforward.com',
                'password'=>Hash::make('teacher'),
                'role'=>'Teacher',
            ]
        ];

        foreach($users as $user){
            $user = User::firstOrCreate($user);

            if($user->role == 'Teacher'){
                $user->teacher()->create(['address'=>config('app.name'),'phone'=>'08000000000']);
            }
        }
    }
}
