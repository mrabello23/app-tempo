<?php

/*
|-----------
| Web Routes
|-----------
*/

Route::get('/', 'CidadesController@index');
Route::get('/detalhes/{id}', 'CidadesController@detalhes');
Route::post('/salvar', 'CidadesController@salvar');
