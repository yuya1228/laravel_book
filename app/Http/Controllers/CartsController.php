<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Cart;

class CartsController extends Controller
{
    public function mycart(Cart $cart)
    {
        $data = $cart->ShowCart();

        return view('shops.mycart',$data);
    }

    public function cart(Request $request,Cart $cart)
    {
        $book_id = $request ->book_id;
        $message = $cart->Cart($book_id);

        $data = $cart->showCart();
        return view ('shops.mycart',$data)->with('message','$message');
    }

    public function destroy(Request $request,Cart $cart)
    {
        $book_id = $request->book_id;
        $message = $cart->deleteCart($book_id);

        $data = $cart->showCart();

        return view('shops.mycart',$data)->with('message',$message);
    }

    public function purchase(Cart $cart)
    {
        $cart->purchase();
        return view('shops.purchase');
    }
}
