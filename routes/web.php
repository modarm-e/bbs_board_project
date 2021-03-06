<?php
Auth::routes();
# 127.0.0.1:8000 들어가면 로그인 창
Route::get('/', function () {
    if(!auth()->check()){
        return view('main');
    }
    return redirect('/home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('japan','NabeJapanController');
Route::resource('introduces', 'NabeIntroduceController');
Route::post('introduces/update', 'NabeIntroduceController@update')->name('introduces.update');
Route::resource('qnaArticles','QnaArticlesController');
Route::resource('qnaComments', 'QnaCommentsController', ['only' => ['update', 'destroy']]);
Route::resource('qnaArticles.qnaComments', 'QnaCommentsController', ['only' => 'store']);
DB::listen(function ($query){
});