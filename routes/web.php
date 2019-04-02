<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::group(['prefix' => 'aluno','middleware'=>'auth'], function() {
    Route::post('/', 'Aluno\AlunoController@forms')->name('teste');
    Route::post('/validar', 'Ficha\FichaController@store')->name('gravarF');
});
Route::group(['prefix' => 'secretaria', 'middleware' => 'sec'], function() {
    Route::resource('/', 'Secretaria\SecretariaController');
    Route::resource('aluno', 'Aluno\AlunosController');
    Route::post('alunos', 'Aluno\AlunosController@pesquisar')->name("pesquisaAluno");

    Route::resource('/fichas', 'Ficha\FichasController');
    Route::post('/fichas', 'Ficha\FichasController@pesquisar')->name("pesquisaFicha");
});



Route::group(['prefix' => 'coe', 'middleware' => 'coe'], function() {
    Route::name('alunoC.')->group(function () {
        Route::resource('alunos', 'Aluno\AlunosController');
    });
    Route::group(['prefix' => 'fichas'], function() {
        Route::get('/', 'Ficha\FichasController@indexCOE');
        Route::get('/obrigatorio', 'Ficha\FichasController@indexOb');
        Route::get('/nao-obrigatorio', 'Ficha\FichasController@indexNOb');
        Route::get('/{id}', 'Ficha\FichasController@showCOE')->name("ficha");
    });



    //Route::resource('/fichas', 'Ficha\FichasController');
    Route::post('/fichas', 'Ficha\FichasController@pesquisar')->name("pesquisaFicha");
    Route::post('alunos', 'Aluno\AlunosController@pesquisar')->name("pesquisaCAluno");

    Route::post('');
});




Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
