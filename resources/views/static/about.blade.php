@extends('layout/main')

@section('page-title')
{{ $title }}
@endsection

@section('content')
    <div class="block">
        <h1>Про нас</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sed rem in nulla iure sint aut dolorem architecto quasi dolor ad accusamus nihil impedit, earum suscipit officia molestias, nobis maiores!</p>

    @if(count($params) > 0)
        <ul>
            @foreach ($params as $el)
                <li>{{ $el }}</li>
            @endforeach
        </ul>
    @endif
    </div>
@endsection