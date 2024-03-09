<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([['name'=>'ali','email'=>'ali@gmail.com','password'=>Hash::make('ali')],
    ['name'=>'hadi','email'=>'hadi@gmail.com','password'=>Hash::make('hadi')],
    ['name'=>'mahdi','email'=>'mahdi@gmail.com','password'=>Hash::make('mahdi')]]);
    }
}
