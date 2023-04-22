@extends('layouts.book')

@section('content')
    {{-- フラッシュメッセージ --}}
    <script>
        @if (session('message'))
            $(function() {
                toastr.success('{{ session('message') }}')
            });
        @endif
    </script>
    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <div>
                <label for="name">名前</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div>
                <label for="image">画像</label>
                <input type="file" name="image" value="{{ old('image') }}">
                @error('image')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div>
                <label for="text">内容</label>
                <textarea name="text" id="" cols="30" rows="10">{{ old('text') }}</textarea>
                @error('text')
                    <li>{{ $message }}</li>
                @enderror
            </div>
            <div>
                <label for="category_id">カテゴリー</label>
                <input type="number" min="1" max="5" name="category_id" value="{{ old('category_id') }}">
                @error('category_id')
                <li>{{ $message }}</li>
                @enderror
            </div>
            <div>
                <label for="quantity">数</label>
                <input type="number" name="quantity" min="0" value="{{ old('quantity') }}" min:0 placeholder="在庫数を入れてください">
                @error('quantity')
                    <li>{{ $message }}</li>
                @enderror
            </div>
        </div>
        </div>
        <button type="submit">送信</button>
    </form>
@endsection
