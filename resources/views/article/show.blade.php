@extends('layout/main')

@section('page-title')
{{ $article->title }}
@endsection

@section('content')
    <h1 class="mb-4">{{ $article->title }} / Статья на Blog Spot</h1>
    <a href="/" class="btn btn-secondary mb-4">На главную</a>
    
    <div class="card mb-4">
        <img src="/storage/img/articles/{{$article->image}}" class="card-img-top" alt="{{ $article->title }}">
        <div class="card-body">
            <h2 class="card-title">{{ $article->title }}</h2>
            <p class="card-text"><strong>Анонс:</strong> {{ $article->anons }}</p>
            <p class="card-text">{!! $article->text !!}</p>
            <p class="card-text"><strong>Автор:</strong> {{ $article->user->name ?? 'Неизвестно' }}</p>
        </div>
        @auth
            @if(Auth::user()->id == $article->user_id)
                <div class="card-footer d-flex justify-content-between">
                    <a href="/article/{{$article->id}}/edit" class="btn btn-warning">Изменить</a>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['ArticlesController@destroy', $article->id]]) !!}
                        {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                </div>
            @endif
        @endauth
    </div>

    {{-- Сообщение об успешном добавлении комментария --}}
    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Отображение комментариев --}}
    <div class="mb-4">
        <h3 class="mb-3">Комментарии</h3>
        @forelse($article->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p><strong>{{ $comment->user->name }}</strong> <span class="text-muted">({{ $comment->created_at->format('d.m.Y H:i') }})</span></p>
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
        @empty
            <p class="text-muted">Комментариев пока нет.</p>
        @endforelse
    </div>

    {{-- Форма для добавления комментария --}}
    @auth
        <div class="mb-4">
            <h3 class="mb-3">Добавить комментарий</h3>
            <form action="{{ route('comment.store', $article->id) }}" method="POST" class="form-group">
                @csrf
                <textarea name="content" placeholder="Введите ваш комментарий" rows="4" class="form-control mb-3" required></textarea>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    @else
        <p>Чтобы оставить комментарий, <a href="/login" class="text-primary">войдите</a> в систему.</p>
    @endauth
@endsection
