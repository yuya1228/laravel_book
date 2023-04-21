@extends('layouts.book')

@section('book_header')

@section('content')
    <div>
        <img src="{{ asset('storage/' . $books->image) }}" alt="" style="width: 10%;">
        <p>{{ $books->name }}</p>
        <p>商品内容:{{ $books->text }}</p>
        <p>在庫数:{{ $books->quantity }}</p>
    </div>
@endsection
