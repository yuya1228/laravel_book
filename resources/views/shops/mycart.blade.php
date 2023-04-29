@extends('layouts.book')

@section('book_header')

@section('content')
    <h2>{{ Auth::user()->name }}さんのカート</h2>
    @foreach ($my_carts as $my_cart)
        <div class="text-center font-mono">
            <img src="{{ asset('storage/' . $my_cart->book->image) }}" alt="" style="width: 20%;" class="m-auto mt-32">
            <h2 class="text-3xl">タイトル</h2>
            <p class="text-2xl">{{ $my_cart->book->book_name }}</p>
            <p>商品内容:{{ $my_cart->book->text }}</p>
            <p>価格:{{ $my_cart->book->price }}円</p>
            <p>在庫数:{{ $my_cart->book->quantity }}</p>
        </div>
    @endforeach
    <a href="{{ route('books.index') }}" class="bg-green-500 hover:bg-green-300 center text-white rounded px-3 py-3">一覧へ戻る</a>
@endsection
