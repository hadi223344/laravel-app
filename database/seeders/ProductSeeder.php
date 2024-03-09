<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([['name'=>'snowa','price'=>500,'description'=>'a laundry with much more feature'
    ,'category'=>'laundry', 'gallery'=>'https:https://hips.hearstapps.com/hmg-prod/images/washing-machine-at-blue-wall-frontal-view-with-copy-royalty-free-image-1096523200-1564593294.jpg?crop=0.821xw:0.638xh;0.0896xw,0.289xh&resize=1200:*' ],
    ]);
    }
}
