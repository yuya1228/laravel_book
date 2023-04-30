@extends('layouts.book')

@section('book_header')

@section('content')
<div class="text-center font-mono mt-10">
    <h2 class="text-3xl">{{ Auth::user()->name }}さんご購入ありがとうございました！</h2>
    <p>発送までもうしばらくお待ちください。</p>
    <a href="{{ route('books.index') }}">商品一覧へ</a>
</div>

@endsection
