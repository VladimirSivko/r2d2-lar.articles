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
        <h4>Редактировать статью</h4>
    </div>

    <form action="{{ url('admin/article/save/'.$article->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя статьи -->
        <div class="form-group">
            <br/>
            <div class="col-sm-6">
		<h5><label for="article" class="col-sm-3 control-label">Название</label></h5>
                <input type="text" name="name" id="article-name" class="form-control" value="{{ $article->name }}">
            </div>
            <div class="col-sm-6">
		<h5><label for="article" class="col-sm-3 control-label">Короткий текст</label></h5>
                <input type="text" name="short_text" id="article-short" class="form-control" value="{{ $article->short_text }}">
            </div>
            <div class="col-sm-6">
		<h5><label for="article" class="col-sm-3 control-label">Текст</label></h5>
                <textarea name="text" id="article-text" class="form-control">{{ $article->text }}</textarea>
            </div>
        </div>

        <!-- Кнопка добавления статьи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </form>
</div>

@endsection