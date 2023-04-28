@extends('layouts.book')

@section('book_header')

@section('content')

@foreach ($carts as $cart )
 <div class="text-center font-mono">
        <img src="{{ asset('storage/' . $cart->image) }}" alt="" style="width: 20%;" class="m-auto mt-32">
        <h2 class="text-3xl">タイトル</h2>
        <p class="text-2xl">{{ $cart->book_name }}</p>
        <p>商品内容:{{ $cart->text }}</p>
        <p>価格:{{ $cart->price }}円</p>
        <p>在庫数:{{ $cart->quantity }}</p>
@endforeach

@endsection
