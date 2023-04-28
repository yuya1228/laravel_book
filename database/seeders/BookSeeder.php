<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'id' => 1,
            'category_id' => 1,
            'book_name' => 'PHP',
            'image' => '51IFh0hD6PS._SX260_.jpg',
            'text' => 'PHPの学習本です。',
            'price'=>1000,
            'quantity' => 1
        ]);

        Book::create([
            'id' => 2,
            'category_id' => 2,
            'book_name' => 'JavaScript',
            'image' => '51i53tWFAfL._SX394_BO1,204,203,200_.jpg',
            'text' => 'JavaScriptの学習本です。',
            'price'=>1000,
            'quantity' => 1
        ]);

        Book::create([
            'id' => 3,
            'category_id' => 3,
            'book_name' => 'Java',
            'image' => '519fE4PV71L.jpg',
            'text' => 'Javaの学習本です。',
            'price'=>1000,
            'quantity' => 1.
        ]);

        Book::create([
            'id' => 4,
            'category_id' => 4,
            'book_name' => 'Ruby',
            'image' => '51gT-Nf1DZL._SX218_BO1,204,203,200_QL40_ML2_.jpg',
            'text' => 'Rubyの学習本です。',
            'price'=>1000,
            'quantity' => 1,
        ]);

        Book::create([
            'id' => 5,
            'category_id' => 5,
            'book_name' => 'Python',
            'image' => '519692r4Q7L._SX218_BO1,204,203,200_QL40_ML2_.jpg',
            'text' => 'Pythonの学習本です。',
            'price'=>1000,
            'quantity' => 1,
        ]);
    }
}
