<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function mycart(Request $request)
    {
        $posts = Cart::where('user_id',\Auth::user()->id)->get();
        $query = Cart::query();
        $query->join('books', 'carts.book_id', 'books.id')
            ->join('users', 'carts.user_id', 'users.id')->get();
        $carts = $query->get();

        $user = Auth::user();
        return view('books.mycart', compact('user', 'carts','posts'));
    }

    public function cart(Request $request)
    {
        $user = Auth::id();
        $carts = Cart::all();
        return redirect()->route('books.mycart', compact('user', 'carts'))->with('cart_message', 'カートに入れました。');
    }
}
