<?php
Route::group(['middleware' => ['auths','administrador']], function (){
Route::get('/gestion/progresiveapp', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@index');
Route::post('/gestion/progresiveapp/update', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@update');
Route::get('/gestion/progresiveapp/update', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@update');

Route::get('gestion/nomina', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@nomina');
Route::get('gestion/empleados', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@empleados');
Route::get('gestion/nuevo-empleado', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@empleadonuevo');
Route::get('gestion/informacion-laboral/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@infolaboral');
Route::post('gestion/nomina/crear-empleado', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearempleado');
Route::post('gestion/nomina/crear-informacion', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearinformacion');
Route::get('gestion/nomina/desprendible/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@desprendible');
Route::get('gestion/ver-nominas/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@vernominas');
Route::post('gestion/generar-nomina', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@generarnomina');
Route::get('gestion/periodos', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@periodos');
Route::get('nomina/proceso/{id}', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@procesos');
Route::get('nomina/configuracion', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@configuracion');
Route::post('/gestion/nomina/crear-periodo', 'DigitalsiteSaaS\Progresiveapp\Http\ProgresiveappController@crearperiodo');
});



