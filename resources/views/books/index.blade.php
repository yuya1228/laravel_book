@extends('layouts.book')

@section('book_header')

@section('content')
    <nav>
        <ul>
            <form action="{{ route('books.index') }}" method="GET">
                @csrf
                <li>商品検索<input type="text" name="keyword" value="{{ $keyword }}"><button type="submit"
                        class="bg-blue-500 text-white rounded px-4 py-2">検索</button></li>
            </form>
            <li>
                <input type="hidden" name="category">
                カテゴリー検索:<select name="category">
                    <option value="hidden">カテゴリー検索</option>
                    @foreach ($categories->unique('category') as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </select>
            </li>
        </ul>
    </nav>
    <h2 class="text-center text-6xl font-mono border-b-8">本一覧画面</h2>
    <div class="flex flex-wrap mt-6">
        @foreach ($items as $item)
            <img src="{{ asset('storage/' . $item->image) }}" style="width: 12%;" class="p-3">
            <div class="mr-10">
                <h2 class="mt-4 font-bold">タイトル</h2>
                <h3>{{ $item->name }}</h3>
                <p class="mt-2">商品内容<br>{{ $item->text }}</p>
                <p class="mt-2">カテゴリー:{{ $item->category }}</p>
                <p class="mt-2">在庫数:{{ $item->quantity }}</p>
                <a href="{{ route('books.show', $item->id) }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white rounded px-1 py-1">詳細</a>
                <a href="{{ route('books.edit', $item->id) }}"
                    class="bg-red-500 hover:bg-red-400 text-white rounded px-1 py-1">編集</a>
                <form action="{{ route('books.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    <button class="bg-gray-500 hover:bg-gray-400 text-white rounded px-1 py-1">削除</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
