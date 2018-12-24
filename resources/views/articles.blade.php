@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')    
</div>

<!-- статьи -->
@if (count($articles) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Список статей
    </div>

    <div class="panel-body">
        <table class="table table-striped article-table">

            <!-- Заголовок таблицы -->
            <thead>
            <th>Название</th>
            <th>Короткий текст</th>
            <th>Дата создания</th>
            </thead>

            <!-- Тело таблицы -->
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <!-- Название статьи -->
                    <td class="table-text">
                        <div><a href="{{ url('/article/'.$article->id) }}">{{ $article->name }}</a></div>
                    </td>
                    <td class="table-text">
                        <div>{{ $article->short_text }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $article->created_at }}</div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection