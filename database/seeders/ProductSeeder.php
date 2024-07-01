<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
            'name' => "Iphone",
            'price' => 199.99,
            'description' => "Greate cell",
            'image' => "urlImage",
            ],
            [
            'name' => "NoteBook",
            'price' => 699.99,
            'description' => "Gamer",
            'image' => "urlImage",
            ],
        ]);
    }
}
