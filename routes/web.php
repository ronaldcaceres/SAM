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

Route::get('/', function () {
    return view('usuarios/login');
});


Route::get('index', function () {
    return view('index');
});






Route::get('usuarios/login', 'LoginController@shore');


Route::post('usuarios/login', 'LoginController@index');


Route::get('prueba/{idPerfil}', 'RolPerfilController@roles');






Route::resource('usuarios', 'UsuariosController');

Route::resource('aplicacion', 'AplicacionController');

Route::resource('perfil', 'PerfilController');

Route::resource('rol', 'RolController');

Route::resource('rolperfil', 'RolPerfilController');

Route::resource('usuarioaplicacionperfil', 'UsuarioAplicacionPerfilController');

Route::resource('usuarioaplicacion', 'UsuarioAplicacionController');

Route::resource('cargos', 'CargosController');

Route::resource('areas', 'AreasController');

Route::resource('regionales', 'RegionalesController');

/*---------*/

Route::get('/prodview','PruebaController@prodfunct');

Route::get('/findProductName','PruebaController@findProductName');

Route::get('/findPrice','PruebaController@findPrice');











Route::get('perfilrol/{idAplicacion}/{idPerfil}', 'PerfilController@roles');

Route::post('agregarrol', 'PerfilController@agregarrol');



/*-----CargosAreas------*/
Route::get('CargosAreas/{idArea}','AreasController@cargarcargos');
Route::post('storecargos', 'AreasController@storecargos');
Route::get('CargosAreasEliminar/{idCargo}','AreasController@eliminarcargo');



/*-----usuarios_areas_cargos_ajax---------*/

Route::get('/prodview','UsuariosController@prodfunct');

Route::get('/findProductName','UsuariosController@findProductName');

Route::get('/findPrice','UsuariosController@findPrice');

/*-----perfil_rol-----*/
Route::get('PerfilRol/{idPerfil}','PerfilController@cargarroles');
Route::post('storeroles', 'PerfilController@storeroles');
Route::get('RolPerfilEliminar/{idRol}','PerfilController@eliminarrol');