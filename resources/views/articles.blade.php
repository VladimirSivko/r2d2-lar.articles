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
        <h2>Новости дня</h2>
    </div>
    <br/>
    <div class="panel-body">
	<dl>
	    @foreach ($articles as $article)
	    <dt><a href="{{ url('/article/'.$article->id) }}">{{ $article->name }}</a></dt>
	    <dd>{{ $article->created_at }}</dd>
	    <dd>{{ $article->short_text }}</dd>
	    @endforeach
	</dl>
    </div>
</div>
@endif

@endsection