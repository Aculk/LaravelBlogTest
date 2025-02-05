@extends('layout.main')

@section('page-title')
Кабинет пользователя
@endsection

@section('content')

<div class="block">
    <h1>Кабинет пользователя</h1>
    @if (session('status'))
        <div class="success-mess">
            {{ session('status') }}
        </div>
    @endif
    <p>Привет, {{ Auth::user()->name }}</p>
    <p>{{ Auth::user()->email }}</p>
</div>

    @if(count($articles) > 0)
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
    @endif
@endsection
