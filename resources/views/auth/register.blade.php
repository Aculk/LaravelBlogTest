@extends('layout\main')

@section('page-title')
Регистрация
@endsection

@section('content')
    <h1>Регистрация</h1>
    <a href="/" class="back-button">На главную</a>
    <form method="POST" action="/register" class="article-form">
        @csrf
        
        <label for="name">Имя</label>
        <input id="name" type="text" value="{{ old('name') }}" name="name">

        <label for="email">Email</label>
        <input id="email" type="email" value="{{ old('email') }}" name="email">

        <label for="password">Пароль</label>
        <input id="password" type="password" value="{{ old('password') }}" name="password">

        <label for="password-confirm">Подтверждение пароля</label>
        <input id="password-confirm" type="password" value="{{ old('password_confirmation') }}" name="password_confirmation">

        <input type="submit" value="Зарегистрироваться" style="width: 170px"/>
    </form>
@endsection
