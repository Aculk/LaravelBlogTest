@extends('layout/main')

@section('page-title')
Главная страница сайта
@endsection

@section('content')
    <div class="presentation"></div>

    <div class="articles">
    @foreach ($articles as $el)
        <div class="post">
            <img src="/storage/img/articles/{{$el->image}}"/>
            <h2>{{ $el->title }}</h2>
            <p>{{ $el->anons }}</p>
            <p><b>Автор:</b> {{ $el->user->name ?? 'Неизвестно' }}</p>
            <a href="/article/{{ $el->id }}">Прочитать</a>
        </div>
    @endforeach
    </div>
@endsection
