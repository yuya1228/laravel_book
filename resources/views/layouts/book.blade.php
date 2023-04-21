<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<header class="bg-gray-300">
    @yield('book_header')
    <a href="{{ route('books.index') }}">
        <h1 class="text-blue-500 text-6xl text-center font-mono">
            Book</h1>
    </a>
</header>

<body>
    @yield('content')
</body>

</html>
