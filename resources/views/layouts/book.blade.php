<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<header>
    @yield('book_header')
    <a href="{{ route('books.index') }}">
        <h1 class="text-white hover:text-blue-500 text-6xl text-center font-mono pt-24">
            Book</h1>
    </a>
    <div id="app">
        <button type="button" class="menu-btn" v-on:click="open=!open">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="menu" v-bind:class="{'is-active':open}">
            <a href="{{ route('books.index') }}" class="menu_item">一覧ページ</a>
            <a href="{{ route('shops.mycart') }}" class="menu_item">マイカート</a>
            @can('admin')
                <a href="{{ route('books.create') }}" class="menu_item">本の登録</a>
            @endcan
            @can('admin')
                <a href="{{ route('admin.create') }}" class="menu_item">管理者専用ユーザー作成</a>
            @endcan
            <a href="/register" class="menu_item">新規登録</a>
            <a href="/login" class="menu_item">ログイン</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" class="menu_item" value="ログアウト">
            </form>
        </div>
    </div>
</header>

<body>
    @yield('content')
</body>

</html>
