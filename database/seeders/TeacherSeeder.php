<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'forename' => 'Admin',
            'surname' => 'Adminus',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'token' => 'admin',
        ]);
    }
}
