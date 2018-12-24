<?php

use App\Article;
use Illuminate\Http\Request;

/**
 * Вывод лицевой части со списком статей
 */
Route::get('/', function () {
    $articles = Article::orderBy('created_at', 'asc')->get();
    return view('articles', [
        'articles' => $articles
    ]);
});

/**
 * Вывод admin-панели с формой и списком статей
 */
Route::get('admin/', function () {
    $articles = Article::orderBy('created_at', 'asc')->get();
    return view('admin_articles', [
        'articles' => $articles
    ]);
});

/**
 * Добавить новую статью
 */
Route::post('admin/article', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'short_text' => 'required|max:65500',
        'text' => 'required|max:65500',
    ]);

    if ($validator->fails()) {
        return redirect('admin/')
            ->withInput()
            ->withErrors($validator);
    }
    $new_article = new Article;
    $new_article->name = $request->name;
    $new_article->short_text = $request->short_text;
    $new_article->text = $request->text;
    $new_article->save();
    return redirect('admin/');
});

/**
 * Удалить статью
 */
Route::delete('admin/article/{article}', function (Article $article) {
    $article->delete();
    return redirect('admin/');
});

/**
 * редактировать статью
 */
Route::post('admin/article/edit/{article}', function (Article $article) {
     return view('edit', [
        'article' => $article
    ]);
});
/**
 * сохранить измененную статью
 */
Route::post('admin/article/save/{article}', function (Article $article, Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'short_text' => 'required|max:65500',
        'text' => 'required|max:65500',
    ]);

    if ($validator->fails()) {
        return redirect('admin/')
            ->withInput()
            ->withErrors($validator);
    }
    $article->name = $request->name;
    $article->short_text = $request->short_text;
    $article->text = $request->text;
    $article->save();
    return redirect('admin/');
});
