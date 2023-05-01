@extends('layouts.book')

@section('header_book')

@section('content')
    {{-- フラッシュメッセージ --}}
    <script>
        @if (session('message'))
            $(function() {
                toastr.success('{{ session('message') }}')
            });
        @endif
    </script>
    <h2 class="text-6xl font-mono text-center mt-10 text-blue-500">本の新規登録</h2>
    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="text-center">
            <div class="m-10">
                <label for="book_name">タイトル</label>
                <input type="text" name="book_name" value="{{ old('book_name') }}">
                @error('book_name')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div class="m-5">
                <label for="image">画像</label>
                <input type="file" name="image" value="{{ old('image') }}">
                @error('image')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div class="m-5">
                <label for="text">内容</label>
                <textarea name="text" id="" cols="30" rows="10">{{ old('text') }}</textarea>
                @error('text')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div class="m-5">
                <label for="category_id">カテゴリー</label>
                <input type="number" min="1" max="5" name="category_id" value="{{ old('category_id') }}">
                @error('category_id')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div class="m-5">
                <label for="quantity">数</label>
                <input type="number" name="quantity" min="0" value="{{ old('quantity') }}"
                    placeholder="在庫数">
                @error('quantity')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div>
                <label for="price">価格</label>
                <input type="number" name="price" min="0" value="{{ old('price') }}" placeholder="価格">
            </div>
            @error('price')
            <li>{{ $message }}</li>
            @enderror
        </div>
        <div class="text-center mt-10">
            <button type="submit" class="bg-green-500 hover:bg-green-300 text-white px-5 py-2">送信</button>
        </div>

    </form>
@endsection
