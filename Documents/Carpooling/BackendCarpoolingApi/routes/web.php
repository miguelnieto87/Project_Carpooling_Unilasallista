<?php
use App\Http\Controllers\UsuariosController;
/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

$router->get('/{route:.*}/', function ()  {
	return view('app');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('lista', 'UsuariosController@Lista');
    $router->post('login', 'UsuariosController@Login');
    $router->post('registrar', 'UsuariosController@Registrar');
});




