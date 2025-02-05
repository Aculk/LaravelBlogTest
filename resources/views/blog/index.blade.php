@extends('layout.main')

@section('page-title', 'Блог сайта')

@section('content')
<div class="container">
    <h1 class="my-4">Блог сайта</h1>
    <div class="row">
        @for ($i = 0; $i < 4; $i++) <!-- Добавляем 4 записи -->
            <div class="col-md-12">
                <div class="card mb-4 p-3" style="background-color: #f1f8ff; border: 1px solid #e1e4e8;">
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 1.5rem; color: #2d3748;">Запись на сайте</h5>
                        <p class="card-text" style="color: #4a5568;">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atque esse illum nemo nesciunt sit.
                            Consectetur necessitatibus nobis obcaecati sequi voluptates!
                        </p>
                        <a href="#" class="btn btn-success">Подробнее</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
