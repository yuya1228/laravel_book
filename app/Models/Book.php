<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = [
        'book_name',
        'category_id',
        'price',
        'image',
        'text',
        'quantity',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
