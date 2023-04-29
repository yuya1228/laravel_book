<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'book_id',
        'user_id'
    ];

    public function cart($book_id)
    {
        $user_id = Auth::id();
        $my_carts = Cart::firstOrCreate(['book_id'=>$book_id,'user_id'=>$user_id]);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function ShowCart()
    {
        $user_id = Auth::id();
        $data['my_carts']=$this->where('user_id',$user_id)->get();

        return $data;
    }
}
