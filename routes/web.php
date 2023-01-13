<?php

/** @var \Laravel\Lumen\Routing\Router $router */

Route::group([

  'prefix' => 'users'

], function ($router) {
  Route::post('login', 'UserController@login');
  Route::post('logout', 'UserController@logout');
  Route::post('refresh', 'UserController@refresh');
  Route::post('me', 'UserController@me');

});

Route::group([

  'prefix' => 'artworks'

], function ($router) {
  Route::get('', 'ArtworkController@getAll');
  Route::get('{id}', 'ArtworkController@get');
  Route::post('', 'ArtworkController@add');
  Route::put('{id}', 'ArtworkController@update');
  Route::delete('{id}', 'ArtworkController@delete');
  Route::get('{id}/pdf', 'ArtworkController@downloadPdf');
});


Route::group([

  'prefix' => 'certifications'

], function ($router) {
  Route::get('', 'CertificationController@getAll');
  Route::get('{id}', 'CertificationController@get');
  Route::post('', 'CertificationController@add');
  Route::put('{id}', 'CertificationController@update');
  Route::delete('{id}', 'CertificationController@delete');
});

// Artwork routes
// $router->get('/artworks', 'ArtworkController@getAll');
// $router->get('/artworks/{id}', 'ArtworkController@get');
// $router->post('/artworks', 'ArtworkController@add');
// $router->put('/artworks/{id}', 'ArtworkController@update');
// $router->delete('/artworks/{id}', 'ArtworkController@delete');
// $router->get('/artworks/{id}/pdf', 'ArtworkController@downloadPdf');

// Certification routes
// $router->get('/certifications', 'CertificationController@getAll');
// $router->get('/certifications/{id}', 'CertificationController@get');
// $router->post('/certifications', 'CertificationController@add');
// $router->put('/certifications/{id}', 'CertificationController@update');
// $router->delete('/certifications/{id}', 'CertificationController@delete');

