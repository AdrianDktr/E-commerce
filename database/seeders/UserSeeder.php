<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = now();
        $data= [
            [
                'name' => 'Dung tak dung dung',
                'email' => 'dungtakdung@gmail.com',
                'password' =>  bcrypt('dungtakdungdungBAU'),
                'is_admin'=>false,
                // 'profile_picture'=>'',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'name' => 'Kevin babi',
                'email' => 'kevinbabi@gmail.com',
                'password' =>  bcrypt('kevinBabi'),
                'is_admin'=>false,
                // 'profile_picture'=>'',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp
            ],
            [
                'name' => 'Adrian ',
                'email' => 'admin@admin.com',
                'password' =>  bcrypt('Dktr19'),
                'is_admin'=>true,
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp

            ]

        ];

        DB::table('users')->insert($data);
    }
}

