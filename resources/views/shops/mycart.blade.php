@extends('layouts.book')

@section('book_header')

@section('content')
    <h2 class="text-3xl">{{ Auth::user()->name }}さんのカート</h2>
    <p class="message text-center">{{ $message ?? '' }}</p>

    @if ($my_carts->isNotEmpty())
        <div class=" font-mono flex flex-wrap text-center">
            @foreach ($my_carts as $my_cart)
                <div class="ml-20">
                    <img src="{{ asset('storage/' . $my_cart->book->image) }}" class="m-auto mt-10 w-40">
                    <h2 class="text-3xl">タイトル</h2>
                    <p class="text-2xl">{{ $my_cart->book->book_name }}</p>
                    <p>商品内容:{{ $my_cart->book->text }}</p>
                    <p>価格:{{ $my_cart->book->price }}円</p>
                    <p>在庫数:{{ $my_cart->book->quantity }}</p>

                    <form action="{{ route('cart.delete') }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="book_id" value="{{ $my_cart->book->id }}">
                        <input type="submit" value="カートから削除する"
                            class="bg-gray-500 hover:bg-gray-400 text-white rounded px-1 py-1"
                            onclick="return confirm('本当に削除しますか？');">
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p class="empty">カートは空っぽです</p>
    @endif
    <div class="text-center mt-16"><a href="{{ route('books.index') }}"
            class="bg-green-500 hover:bg-green-300 center text-white rounded px-3 py-3">一覧へ戻る</a></div>
@endsection
