<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page-title', 'Blog Spot')</title>
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" crossorigin>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <!-- Header -->
    <header class="container">
        <span class="logo">Blog Spot</span>
        <nav>
            <a href="/">Главная</a>
            <a href="/about-us">Про нас</a>
            <a href="/blog">Блог</a>
            <a href="/public/shop">Товары</a>

            @guest
                <a href="/login">Войти</a>
                <a href="/register">Регистрация</a>
            @else
                <a href="/user">{{ Auth::user()->name }}</a>
                <a href="/article/add">Добавить статью</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Выйти</button>
                </form>
            @endguest
        </nav>
    </header>
    
    

    <!-- Main content -->
    <main class="container py-4">
        @include('blocks.messages')
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-light py-3 text-center">
        <div class="container">
            <p class="mb-0">Все права защищены &copy; {{ date('Y') }}</p>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts') <!-- Подключение дополнительных скриптов -->
</body>
</html>
