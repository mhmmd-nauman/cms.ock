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
Route::get('/', 'IndexController@index');

Route::get('create_vacancy', 'IndexController@create');
Route::get('online_apply', 'IndexController@Online_job_vacancy');
Route::post('Add_Application', 'IndexController@store');

Route::get('ListDeedAdmin',array('uses' => 'AdminController@index'));
Route::post('adminLogin', array('uses' => 'AdminController@adminLogin'));
Route::get('adminLogout', array('uses' => 'AdminController@adminLogout'));
Route::get('dashboard', array('uses' => 'AdminController@showDashboard'));
Route::get('index_edit', array('uses' => 'AdminIndexPageController@showIndexPageEditor'));
Route::get('news_events_list', array('uses' => 'EventfoldersController@index'));
Route::get('careers_job_vacancy_list', array('uses' => 'AdminCareersController@showAdminVacancies'));
//Route::get('careers_online_applicants_list', array('uses' => 'AdminCareersController@showAdminOnlineApplicants'));


Route::post('adminsavepage', array('uses' => 'BusinessController@doStore'));
Route::post('save_page_contents', array('uses' => 'PageController@saveContents'));


Route::get('users', array('uses' => 'AdminController@home'));
Route::get('Profile/{id}',array('uses' => 'AdminController@userProfile'));

Route::get('edit-profile/{id}',array('uses' => 'AdminController@showEditProfile'));
Route::post('update-profile',array('uses' => 'AdminController@updateProfile'));
Route::post('businesses_create', 'BusinessController@doStore');
Route::post('businesses_update/{id}', 'BusinessController@update');
Route::post('montage', 'MontageController@Store');
Route::post('deletemontage/{id}', 'MontageController@dodestroy');
Route::post('update_emontage/{id}', 'MontageController@update');
Route::post('Add_Vacancy', 'CareersController@Store');
Route::get('career_vac_edit', 'CareersController@index');
Route::post('deletevecancy/{id}', 'CareersController@dodestroy');
Route::post('update_career/{id}', 'CareersController@update');
Route::resource('addnew', 'EventfoldersController');
Route::post('update_event/{id}', 'EventfoldersController@update');
Route::post('delete_event/{id}', 'EventfoldersController@destroy');
Route::post('savecontents', 'PageController@updateContents');
Route::get('careers_online_applicants_list', array('uses' => 'VacancyController@index'));
Route::post('delete_application/{id}', 'VacancyController@destroy');


