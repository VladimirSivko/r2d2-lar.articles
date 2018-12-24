@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')    
</div>

<!-- статьи -->
<div class="panel panel-default">
    <div class="panel-heading">
        Текст статьи
    </div>
    <br/>
    <div class="panel-body">
        {{ $article->text }}
    </div>
    <br/>
    <a href="/">Вернуться ко всем статьям</a>
</div>

@endsection