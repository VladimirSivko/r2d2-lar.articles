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
        <h4>Загрузить изображение</h4>
    </div>

    <form action="/admin/image/save" enctype="multipart/form-data" method="post">
	{{ csrf_field() }}
	<div class="form-group">
	    <input type="text" name="name" id="image-name" class="form-control" placeholder="Название"/>
	</div>
	<div class="form-group">
	    <input type="file" name="img" accept="image/*">
	</div>
	<div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    Загрузить
                </button>
            </div>
    </form>
</div>

@endsection