<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=array(
            array(
                'name'      => 'Rocheli',
                'type'      => 'admin',
                'mobile'    => '676396854',
                'email'     => 'mforbesibuesi@gmail.com',
                'password'  => Hash::make('123456'),
                'image'     => '',
                'status'    => 1,
            ),
        );
        DB::table('admins')->insert($data);
    }
}
