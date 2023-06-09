@extends('layouts.book')

@section('book_header')
 {{-- フラッシュメッセージ --}}
    <script>
        @if (session('cart_message'))
            $(function() {
                toastr.success('{{ session('cart_message') }}')
            });
        @endif
    </script>
@section('content')

    @if (Auth::check())
        <p class="font-mono text-2xl mt-10">こんにちは＾＾{{ $user->name }}さん</p>
    @else
        <p class="font-mono text-2xl">
            ログインしてください（<a href="/login">ログイン</a>|<a href="/register">登録</a>）
        </p>
    @endif

    <div class="flex justify-end">
        <nav>
            <ul>
                <form action="{{ route('books.index') }}" method="GET">
                    @csrf
                    <li><input type="text" name="keyword" class="font_icon" value="{{ $keyword }}"
                            placeholder="&#xf002"><button type="submit"
                            class="bg-blue-500 text-white rounded px-4 py-2 ">検索</button></li>
                <li>
                    <input type="hidden" name="category">
                    <select name="category" class="ml-28 mt-3">
                        <option value="hidden">カテゴリー検索</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </li>
                </form>
            </ul>
        </nav>
    </div>
    <h2 class="text-center text-6xl font-mono">本一覧画面</h2>
    <div class="flex flex-wrap mt-6 text-center">
        @foreach ($items as $item)
            <img src="{{ asset('storage/' . $item->image) }}" style="width: 17%;" class="p-3">
            <div class="mr-10">
                <h2 class="mt-4 font-bold">タイトル</h2>
                <h3>{{ $item->book_name }}</h3>
                <p class="mt-2">商品内容<br>{{ $item->text }}</p>
                <p class="mt-2">カテゴリー:{{ $item->category }}</p>
                <p class="mt-2">価格:{{ $item->price }}円</p>
                <p class="mt-2">在庫数:{{ $item->quantity }}</p>
                <a href="{{ route('books.show', $item->id) }}"
                    class="bg-blue-500 hover:bg-blue-400 text-white rounded px-1 py-1">詳細</a>
                @can('admin')
                    <a href="{{ route('books.edit', $item->id) }}"
                        class="bg-red-500 hover:bg-red-400 text-white rounded px-1 py-1">編集</a>
                @endcan
                <form action="{{ route('books.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('Delete')
                    @can('admin')
                        <button class="bg-gray-500 hover:bg-gray-400 text-white rounded px-1 py-1">削除</button>
                    @endcan
                </form>
                <form action="{{ route('cart')}}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $item->id }}">
                    <input type="submit" class="bg-yellow-500 hover:bg-yellow-300 text-white rounded px-1 py-1"
                    value="カートに入れる。">
                </form>
            </div>
        @endforeach
    </div>
    {{ $items->links() }}
@endsection
