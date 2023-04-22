<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
</head>
<header class="bg-gray-300">
    @yield('book_header')
    <a href="{{ route('books.index') }}">
        <h1 class="text-blue-500 text-6xl text-center font-mono">
            Book</h1>
    </a>
    <div id="app">
        <button type="button" class="menu-btn" v-on:click="open=!open">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <div class="menu" v-bind:class="{'is-active':open}">
            <a href="{{ route('books.index') }}" class="menu_item">一覧ページ</a>
            <a href="{{ route('books.create') }}" class="menu_item">新規作成</a>
        </div>
    </div>
</header>

<body>
    @yield('content')
</body>

</html>
