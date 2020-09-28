<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('register', 'AuthController@register');
     

     ////

    Route::get('user', 'UserController@index');
    Route::get('user/{id}', 'UserController@show');
    Route::post('user', 'UserController@store');
    Route::put('user/{id}', 'UserController@update');
    Route::delete('user/{id}', 'UserController@destroy');


    ///
    Route::get('categorie','CategorieMissionController@index');
    Route::get('categorie/{id}', 'CategorieMissionController@show');
    Route::post('categorie', 'CategorieMissionController@store');
    Route::put('categorie/{id}', 'CategorieMissionController@update');
     Route::delete('categorie/{id}', 'CategorieMissionController@destroy');

     ///
      Route::get('annee_mission', 'AnneeMissionController@index');
    Route::get('annee_mission/{id}', 'AnneeMissionController@show');
    Route::post('annee_mission', 'AnneeMissionController@store');
    Route::put('annee_mission/{id}', 'AnneeMissionController@update');
    Route::delete('annee_mission/{id}', 'AnneeMissionController@destroy');
    Route::post('activedAnne','AnneeMissionController@activeAnnee');


    ///
    Route::get('fonction','FonctionController@index');
    Route::get('fonction/{id}', 'FonctionController@show');
    Route::post('fonction', 'FonctionController@store');
    Route::put('fonction/{id}', 'FonctionController@update');
     Route::delete('fonction/{id}', 'FonctionController@destroy');


    Route::get('modePaiemt', 'ModePaiementController@index');
    Route::get('modePaiemt/{id}', 'ModePaiementController@show');
    Route::post('modePaiemt', 'ModePaiementController@store');
    Route::put('modePaiemt/{id}', 'ModePaiementController@update');
    Route::delete('modePaiemt/{id}', 'ModePaiementController@destroy');


    ///
    Route::get('transport','MoyenTransportController@index');
    Route::get('transport/{id}', 'MoyenTransportController@show');
    Route::post('transport', 'MoyenTransportController@store');
    Route::put('transport/{id}', 'MoyenTransportController@update');
     Route::delete('transport/{id}', 'MoyenTransportController@destroy');

     ///
      Route::get('norme', 'NormeMissionController@index');
    Route::get('norme/{id}', 'NormeMissionController@show');
    Route::post('norme', 'NormeMissionController@store');
    Route::put('norme/{id}', 'NormeMissionController@update');
    Route::delete('norme/{id}', 'NormeMissionController@destroy');


    ///
    Route::get('role','RoleController@index');
    Route::get('role/{id}', 'RoleController@show');
    Route::post('role', 'RoleController@store');
    Route::put('role/{id}', 'RoleController@update');
     Route::delete('role/{id}', 'RoleController@destroy');
     
    Route::get('pays', 'PaysController@index');
    Route::get('pays/{id}', 'PaysController@show');
    Route::post('pays', 'PaysController@store');
    Route::put('pays/{id}', 'PaysController@update');
    Route::delete('pays/{id}', 'PaysController@destroy');


    ///
    Route::get('plan','PlanPaysController@index');
    Route::get('plan/{id}', 'PlanPaysController@show');
    Route::post('plan', 'PlanPaysController@store');
    Route::put('plan/{id}', 'PlanPaysController@update');
     Route::delete('plan/{id}', 'PlanPaysController@destroy');

      Route::get('typeMission','TypeMissionController@index');
    Route::get('typeMission/{id}', 'TypeMissionController@show');
    Route::post('typeMission', 'TypeMissionController@store');
    Route::put('typeMission/{id}', 'TypeMissionController@update');
    Route::delete('typeMission/{id}', 'TypeMissionController@destroy');

     Route::get('userRole','UserRoleController@index');
    Route::get('userRole/{id}', 'UserRoleController@show');
    Route::post('userRole', 'UserRoleController@store');
    Route::put('userRole/{id}', 'UserRoleController@update');
     Route::delete('userRole/{id}', 'UserRoleController@destroy');

      Route::get('personnel','PersonnelController@index');
    Route::get('personnel/{id}', 'PersonnelController@show');
    Route::post('personnel', 'PersonnelController@store');
    Route::put('personnel/{id}', 'PersonnelController@update');
     Route::delete('personnel/{id}', 'PersonnelController@destroy');

    Route::get('situation','SituationMatrimonialeController@index');
    Route::get('situation/{id}', 'SituationMatrimonialeController@show');
    Route::post('situation', 'SituationMatrimonialeController@store');
    Route::put('situation/{id}', 'SituationMatrimonialeController@update');
     Route::delete('situation/{id}', 'SituationMatrimonialeController@destroy');


     Route::get('role','RoleController@index');
    Route::get('role/{id}', 'RoleController@show');
    Route::post('role', 'RoleController@store');
    Route::put('role/{id}', 'RoleController@update');
     Route::delete('rolr/{id}', 'RoleController@destroy');

     // route activite

    Route::get('activite','ActiviteController@index');
    Route::get('activite/{id}', 'ActiviteController@show');
    Route::post('activite', 'ActiviteController@store');
    Route::put('activite/{id}', 'ActiviteController@update');
     Route::delete('activite/{id}', 'ActiviteController@destroy');

      // route plan activite

    Route::get('plan_activite','PlanActiviteController@index');
    Route::get('plan_activite/{id}', 'PlanActiviteController@show');
    Route::post('plan_activite', 'PlanActiviteController@store');
    Route::put('plan_activite/{id}', 'PlanActiviteController@update');
     Route::delete('plan_activite/{id}', 'PlanActiviteController@destroy');

// route budget

    Route::get('budget','budgetController@index');
    Route::get('budget/{id}', 'budgetController@show');
    Route::post('budget', 'budgetController@store');
    Route::put('budget/{id}', 'budgetController@update');
     Route::delete('budget/{id}', 'budgetController@destroy');


     Route::get('missions','MisionsController@index');
    Route::get('missions/{id}', 'MisionsController@show');
    Route::post('missions', 'MisionsController@store');
    Route::put('missions/{id}', 'MisionsController@update');
     Route::delete('missions/{id}', 'MisionsController@destroy');


     Route::get('hotel','HotelController@index');
    Route::get('hotel/{id}', 'HotelController@show');
    Route::post('hotel', 'HotelController@store');
    Route::put('hotel/{id}', 'HotelController@update');
     Route::delete('hotel/{id}', 'HotelController@destroy');


     Route::get('carburant','CarburantController@index');
    Route::get('carburant/{id}', 'CarburantController@show');
    Route::post('carburant', 'CarburantController@store');
    Route::put('carburant/{id}', 'CarburantController@update');
     Route::delete('carburant/{id}', 'CarburantController@destroy');
});