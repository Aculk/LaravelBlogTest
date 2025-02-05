@extends('layout.main')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Наши товары</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm" style="background-color: #83c1ff; border-radius: 8px;">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 24px; font-weight: bold; color: #333;">{{ $product->title }}</h5>
                    <p class="card-text" style="font-size: 16px; color: #6c757d;">{{ $product->anons }}</p>
                    <p class="card-text" style="font-size: 18px; font-weight: bold; color: #155724;">Цена: {{ $product->price }} ₽</p>
                    <a href="/public/shop/{{ $product->id }}" class="btn btn-primary" style="background-color: #007bff; border: none; padding: 10px 20px; border-radius: 5px;">Подробнее</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection