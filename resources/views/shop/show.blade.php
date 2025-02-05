@extends('layout.main')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm" style="background-color: #80baf4; border-radius: 8px; padding: 20px;">
        <h1 class="mb-4" style="font-size: 28px; font-weight: bold; color: #333;">{{ $product->title }}</h1>
        <p style="font-size: 18px; color: #6c757d;">{{ $product->anons }}</p>
        <p style="font-size: 20px; font-weight: bold; color: #155724;">Цена: {{ $product->price }} ₽</p>
        <a href="/public/shop" class="btn btn-secondary" style="background-color: #0068c4; color: #fff; padding: 10px 20px; border-radius: 5px; width: 150px;">Купить</a>
    </div>
</div>
@endsection
