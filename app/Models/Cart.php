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

        if($my_carts->wasRecentlyCreated){
            $message = 'カートに追加しました。';
        }else{
            $message = 'カートに登録済みです。';
        }

        return $message;
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

    public function deleteCart($book_id)
    {
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->where('book_id', $book_id)->delete();

        if ($delete > 0) {
            $message = 'カートから1つの商品を削除しました';
        } else {
            $message = '削除に失敗しました';
        }
        return $message;
    }
}
