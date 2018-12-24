@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой статьи -->
    <form action="{{ url('admin/article') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя статьи -->
        <div class="form-group">
            <h4><label for="article" class="col-sm-3 control-label">Добавление статьи</label></h4>

            <div class="col-sm-6">
		<h5><label for="article" class="col-sm-3 control-label">Название</label></h5>
                <input type="text" name="name" id="article-name" class="form-control" placeholder="Введите название">
            </div>
            <div class="col-sm-6">
		<h5><label for="article" class="col-sm-3 control-label">Короткий текст</label></h5>
                <input type="text" name="short_text" id="article-short" class="form-control" placeholder="Введите короткий текст">
            </div>
            <div class="col-sm-6">
		<h5><label for="article" class="col-sm-3 control-label">Текст</label></h5>
                <textarea name="text" id="article-text" class="form-control" placeholder="Введите текст"></textarea>
            </div>
        </div>

        <!-- Кнопка добавления статьи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Добавить статью
                </button>
            </div>
        </div>
    </form>
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
            <th>Действие</th>
            </thead>

            <!-- Тело таблицы -->
            <tbody>
                @foreach ($articles as $article)
                <tr>
                    <!-- Название статьи -->
                    <td class="table-text">
                        <div>{{ $article->name }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $article->short_text }}</div>
                    </td>
                    <td class="table-text">
                        <div>{{ $article->created_at }}</div>
                    </td>
                    <td>
                        <form action="{{ url('admin/article/'.$article->id) }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-trash"></i> Удалить статью
                            </button>
                        </form>
			<br/>
                        <form action="{{ url('admin/article/edit/'.$article->id) }}" method="post">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-edit"></i> Редактировать
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection