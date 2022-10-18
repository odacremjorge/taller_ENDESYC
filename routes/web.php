<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\OTController;
use App\Http\Controllers\ReplacementController;
use App\Http\Controllers\OseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DemandController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register" => false]);
//Rutas de Inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/listAssignPDF', [App\Http\Controllers\HomeController::class, 'listAssignPDF'])->name('listAssignPDF');
Route::get('/home/assignPDF/{id}', [App\Http\Controllers\HomeController::class, 'assignPDF'])->name('assignPDF');

//Rutas de Ordenes de Trabajo
Route::resource('ot',OTController::class)->names('ot');
Route::get('/ot/create', [App\Http\Controllers\OTController::class, 'create'])->name('create');
Route::get('/ot/showOT', [App\Http\Controllers\OTController::class, 'show'])->name('showOT');
Route::get('/showOT/otPDF/{id}', [App\Http\Controllers\OTController::class, 'otPDF'])->name('otPDF');
Route::get('/showOT/dateMain/{id}', [App\Http\Controllers\OTController::class, 'dateMain'])->name('dateMain');

//Rutas de Ordenes de Servicio Externo
Route::get('/ose/showOse', [App\Http\Controllers\OseController::class, 'show'])->name('showOse');
Route::resource('ose',OseController::class)->names('ose');
Route::get('/ose/createOse', [App\Http\Controllers\OseController::class, 'create'])->name('createOse');
Route::get('/ose/createOse/{id}', [App\Http\Controllers\OseController::class, 'create_ose'])->name('create_ose');
Route::get('/showOse/osePDF/{id}', [App\Http\Controllers\OseController::class, 'osePDF'])->name('osePDF');

//Rutas de Vehiculos
Route::get('/vehicle/list', [App\Http\Controllers\VehicleController::class, 'list'])->name('list');
Route::resource('vehicle',VehicleController::class)->names('vehicle');
Route::get('/vehicle/price', [App\Http\Controllers\VehicleController::class, 'price'])->name('price');

//Rutas Autocompletado
Route::post('autocomplete', [App\Http\Controllers\OperatorController::class, 'autocomplete'])->name('autocomplete');
Route::get('getdata', [App\Http\Controllers\OperatorController::class, 'getData'])->name('getdata');
Route::post('autocomplete_vehicle', [App\Http\Controllers\VehicleController::class, 'autocomplete_vehicle'])->name('autocomplete_vehicle');
Route::get('getdata_vehicle', [App\Http\Controllers\VehicleController::class, 'getData_vehicle'])->name('getdata_vehicle');
Route::get('getdata_vehicleAssign', [App\Http\Controllers\VehicleController::class, 'getData_vehicleAssign'])->name('getdata_vehicleAssign');
Route::post('autocomplete_client', [App\Http\Controllers\ClientController::class, 'autocomplete'])->name('autocomplete_client');
Route::get('getdata_client', [App\Http\Controllers\ClientController::class, 'getData'])->name('getdata_client');
Route::post('autocompleteDriver', [App\Http\Controllers\OperatorController::class, 'autocompleteDriver'])->name('autocompleteDriver');
Route::get('getdataDriver', [App\Http\Controllers\OperatorController::class, 'getDataDriver'])->name('getdataDriver');
Route::post('autocompleteSolicitante', [App\Http\Controllers\OperatorController::class, 'autocompleteSolicitante'])->name('autocompleteSolicitante');
Route::get('getdataSolicitante', [App\Http\Controllers\OperatorController::class, 'getDataSolicitante'])->name('getdataSolicitante');

//Rutas Operadores y Clientes
Route::get('/operator/client', [App\Http\Controllers\ClientController::class, 'index'])->name('index_client');
Route::get('/operator/list', [App\Http\Controllers\OperatorController::class, 'list'])->name('list_operator');
Route::get('/operator/listPDF', [App\Http\Controllers\OperatorController::class, 'listPDF'])->name('listPDF');
Route::resource('operator',OperatorController::class)->names('operator');
Route::get('/operator', [App\Http\Controllers\OperatorController::class, 'index'])->name('operator');

//Rutas Historiales
Route::resource('record',RecordController::class)->names('record');
Route::get('/record/list_record', [App\Http\Controllers\RecordController::class, 'list_record'])->name('list_record');
Route::get('/record/create/{id}', [App\Http\Controllers\RecordController::class, 'create'])->name('record.createid');
Route::get('/record/recordPDF/{id}', [App\Http\Controllers\RecordController::class, 'recordPDF'])->name('recordPDF');

//Rutas Repuestos
Route::resource('replacement',ReplacementController::class)->names('replacement');

//Rutas Solicitud
Route::resource('demand',DemandController::class)->names('demand');
Route::get('/demand/create/{id}', [App\Http\Controllers\DemandController::class, 'create'])->name('create_demand');
Route::get('/demand/demandPDF/{id}', [App\Http\Controllers\DemandController::class, 'demandPDF'])->name('demandPDF');

Route::group(['middleware' => ['auth', 'administrador']], function () {
    
    //Rutas Ordenes de Trabajo
    Route::get('/showOT/show_cancel/{id}', [App\Http\Controllers\OTController::class, 'show_cancel'])->name('show_cancel');
    Route::get('/showOT/show_finish/{id}', [App\Http\Controllers\OTController::class, 'show_finish'])->name('show_finish');
    Route::post('/showOT/cancel/{id}', [App\Http\Controllers\OTController::class, 'cancel'])->name('ot.cancel');
    Route::post('/showOT/finish/{id}', [App\Http\Controllers\OTController::class, 'finish'])->name('ot.finish');

    // Rutas Vehiculos
    Route::get('/vehicle/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicle.create');
    Route::get('/vehicle/{id}/edit', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicle.editar');

    //Ruta Asignar Vehiculo
    Route::resource('assign',AssignmentController::class)->names('assign');

    //Ruta Operadores y clientes
    Route::get('/operator/{id}/edit', [App\Http\Controllers\OperatorController::class, 'edit'])->name('operator.edition');
    Route::get('/client/create', [App\Http\Controllers\ClientController::class, 'create'])->name('client.create');
    Route::resource('client',ClientController::class)->names('client');

    //Rutas Reportes
    Route::get('/report/day', [App\Http\Controllers\HomeController::class, 'day'])->name('report.day');
    Route::get('/report/Showday', [App\Http\Controllers\HomeController::class, 'Showday'])->name('report.Showday');
    Route::get('/report/week', [App\Http\Controllers\HomeController::class, 'week'])->name('report.week');
    Route::get('/report/Showweek', [App\Http\Controllers\HomeController::class, 'Showweek'])->name('report.Showweek');
    Route::get('/report/month', [App\Http\Controllers\HomeController::class, 'month'])->name('report.month');
    Route::get('/report/Showmonth', [App\Http\Controllers\HomeController::class, 'Showmonth'])->name('report.Showmonth');
    Route::get('/report', [App\Http\Controllers\HomeController::class, 'report'])->name('report.index');
    Route::get('/report/dayPDF', [App\Http\Controllers\HomeController::class, 'dayPDF'])->name('dayPDF');

    //Ruta Usuarios
    Route::resource('users',UserController::class)->names('users');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');

    //Rutas Repuestos
    Route::get('/replacement/{id}/edit', [App\Http\Controllers\ReplacementController::class, 'edit'])->name('replacement.editar');

});