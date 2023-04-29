<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert([
            [
                'id'=>1,
                'user_id'=>1,
                'book_id'=>1,
            ],
            [
                'id' => 2,
                'user_id' => 2,
                'book_id' => 2,
            ],
            [
                'id' => 3,
                'user_id' => 3,
                'book_id' => 3,
            ],
            [
                'id' => 4,
                'user_id' => 4,
                'book_id' => 4,
            ],
            [
                'id' => 5,
                'user_id' => 5,
                'book_id' => 5,
            ],
        ]);
    }
}
