@extends('layouts.book')

@section('book_header')

@section('content')
    <div class="text-center font-mono">
        <img src="{{ asset('storage/' . $books->image) }}" alt="" style="width: 20%;" class="m-auto mt-32">
        <h2 class="text-3xl">タイトル</h2>
        <p class="text-2xl">{{ $books->name }}</p>
        <p>商品内容:{{ $books->text }}</p>
        <p>価格:{{ $books->price }}円</p>
        <p>在庫数:{{ $books->quantity }}</p>
        <form action="{{ route('stripe.charge') }}" method="POST">
            @csrf
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="{{ env('STRIPE_KEY') }}"
                data-amount="1000" data-name="お支払い画面" data-label="購入する" data-description="現在はデモ画面です"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="JPY">
            </script>
        </form>
    </div>
@endsection
