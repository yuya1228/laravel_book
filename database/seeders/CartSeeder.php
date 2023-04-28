<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::create([
            'id'=>1,
            'user_id'=>1,
            'book_id'=>1
        ]);

        Cart::create([
            'id' => 2,
            'user_id' => 2,
            'book_id' => 2
        ]);

        Cart::create([
            'id' => 3,
            'user_id' => 3,
            'book_id' => 3
        ]);

        Cart::create([
            'id' => 4,
            'user_id' => 4,
            'book_id' => 4
        ]);

        Cart::create([
            'id' => 5,
            'user_id' => 5,
            'book_id' => 5
        ]);
    }
}
