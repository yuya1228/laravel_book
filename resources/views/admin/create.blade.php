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
    
    @if (Auth::check())
        <p class="font-mono text-2xl mt-10">こんにちは＾＾{{ $user->name }}さん</p>
    @else
        <p class="font-mono text-2xl">
            ログインしてください（<a href="/login">ログイン</a>|<a href="/register">登録</a>）
        </p>
    @endif

    <h2 class="text-6xl text-center font-mono mt-10">ユーザー作成</h2>
    <form action="{{ route('admin.store') }}" method="post">
        @csrf
        <div class="text-center mt-32">
            <ul>
                <li class="m-5">
                    <label for="name">
                        <input type="text" name="name" placeholder="名前">
                    </label>
                </li>
                @error('name')
                    <li>{{ $message }}</li>
                @enderror
                <li class="m-5">
                    <label for="email">
                        <input type="text" name="email" placeholder="email">
                    </label>
                    @error('email')
                    <li>{{ $message }}</li>
                @enderror
                </li>
                <li class="m-5">
                    <label for="role">
                        <input type="text" name="role" placeholder="権限">
                    </label>
                </li>
                <li class="m-5">
                    <label for="password">
                        <input type="text" name="password" placeholder="パスワード">
                    </label>
                    @error('password')
                    <li>{{ $message }}</li>
                @enderror
                </li>
                <button class="bg-blue-500 hover:bg-blue-400 text-white rounded-md p-3">作成する</button>
            </ul>
        </div>
    </form>
@endsection
