<?php
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::get('/','NotesController@index');
SimpleRouter::get('/new','NotesController@new');
SimpleRouter::post('/new','NotesController@store');
SimpleRouter::get('/{id}','NotesController@show');
SimpleRouter::get('/{id}/edit','NotesController@edit');
SimpleRouter::get('/{id}/delete','NotesController@delete');
SimpleRouter::post('/{id}','NotesController@update');
