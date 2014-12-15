<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('ListDeedAdmin',array('uses' => 'AdminController@index'));
Route::post('adminLogin', array('uses' => 'AdminController@adminLogin'));
Route::get('adminLogout', array('uses' => 'AdminController@adminLogout'));
Route::get('dashboard', array('uses' => 'AdminController@showDashboard'));
Route::get('index_edit', array('uses' => 'AdminIndexPageController@showIndexPageEditor'));
Route::get('news_events_list', array('uses' => 'AdminNewsEventController@showNewsEvent'));
Route::get('careers_job_vacancy_list', array('uses' => 'AdminCareersController@showAdminVacancies'));
Route::get('careers_online_applicants_list', array('uses' => 'AdminCareersController@showAdminOnlineApplicants'));

Route::post('adminsavepage', array('uses' => 'PageController@doStore'));



Route::get('users', array('uses' => 'AdminController@home'));
Route::get('Profile/{id}',array('uses' => 'AdminController@userProfile'));

Route::get('edit-profile/{id}',array('uses' => 'AdminController@showEditProfile'));
Route::post('update-profile',array('uses' => 'AdminController@updateProfile'));
