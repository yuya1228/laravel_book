@extends('layouts.book')

@section('books_header')

@section('content')
<form action="{{ route('books.update',$books->id) }}" method="POST">
@csrf
@method('put')
    <div>
        <ul>
            <li>
                <label for="image">画像
                    <input type="file" name="image" value="{{ $books->image }}"><img src="{{ asset('storage/' . $books->image) }}" alt="{{ $books->image }}" class="w-48"></label>
            </li>
            <li>
                <label for="name">タイトル
                    <input type="text" name="name" value="{{ $books->name }}"></label>
            </li>
            <li>
                <label for="category_id">在庫数
                    <input type="number" name="category_id" value="{{ $books->category_id }}">
                </label>
            <li>
                <label for="text"><p>テキスト</p>
                    <textarea name="text" cols="30" rows="10">{{ $books->text }}</textarea>
                </label>
            </li>
            <label for="quantity">在庫数
                <input type="number" name="quantity" value="{{ $books->quantity }}">
            </label>
            </li>
        </ul>
        <button type="submit" class="bg-green-500 hover:bg-green-400 text-white rounded px-2 py-1">更新する
        </button>
    </div>
    </form>
@endsection
