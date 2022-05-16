<?php
Route::group(['middleware' => ['nomina']], function (){
Route::get('/gestion/progresiveapp', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@index');
Route::post('/gestion/progresiveapp/update', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@update');
Route::get('/gestion/progresiveapp/update', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@update');

Route::get('gestion/empleados', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@nomina');
Route::get('gestion/nomina', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@empleados');
Route::get('gestion/dashboard', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@dashboard');
Route::get('gestion/nuevo-empleado', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@empleadonuevo');
Route::get('gestion/informacion-laboral/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@infolaboral');
Route::post('gestion/nomina/crear-empleado', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearempleado');
Route::get('gestion/nomina/editar-empleado/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarempleado');
Route::get('gestion/nomina/editar-informacion/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarinformacion');
Route::post('/gestion/nomina/updateempleado/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@updateempleado');
Route::post('gestion/nomina/crear-informacion', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearinformacion');
Route::post('gestion/nomina/editar-informacion/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@updateinformacion');
Route::get('gestion/nomina/desprendible/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@desprendible');
Route::get('gestion/ver-nominas/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@vernominas');
Route::post('gestion/generar-nomina', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@generarnomina');
Route::get('gestion/periodos', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@periodos');
Route::get('nomina/proceso/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@procesos');
Route::get('nomina/configuracion', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@configuracion');
Route::post('/gestion/nomina/crear-periodo', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearperiodo');
Route::post('/gestion/nomina/crear-periodofg', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearperiodo');
Route::get('nomina/bancos', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@bancos');
Route::post('/gestion/nomina/crear-banco', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearbanco');
Route::post('/gestion/nomina/editar-banco', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarbanco');
Route::get('/gestion/nomina/eliminar-banco/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@eliminarbanco');
Route::get('nomina/salud', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@salud');
Route::post('/gestion/nomina/crear-salud', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearsalud');
Route::post('/gestion/nomina/editar-salud', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarsalud');
Route::get('/gestion/nomina/eliminar-salud/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@eliminarsalud');
Route::get('nomina/pensiones', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@pensiones');
Route::post('/gestion/nomina/crear-pensiones', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearpensiones');
Route::post('/gestion/nomina/editar-pensiones', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarpensiones');
Route::get('/gestion/nomina/eliminar-pensiones/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@eliminarpensiones');
Route::get('nomina/arl', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@arl');
Route::post('/gestion/nomina/crear-arl', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@creararl');
Route::post('/gestion/nomina/editar-arl', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editararl');
Route::get('/gestion/nomina/eliminar-arl/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@eliminararl');
Route::get('nomina/cesantias', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@cesantias');
Route::post('/gestion/nomina/crear-cesantias', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearcesantias');
Route::post('/gestion/nomina/editar-cesantias', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarcesantias');
Route::get('/gestion/nomina/eliminar-cesantias/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@eliminarcesantias');
Route::get('nomina/compensaciones', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@compensaciones');
Route::post('/gestion/nomina/crear-compensaciones', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearcompensaciones');
Route::post('/gestion/nomina/editar-compensaciones', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@editarcompensaciones');
Route::get('/gestion/nomina/eliminar-compensaciones/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@eliminarcompensaciones');
});



