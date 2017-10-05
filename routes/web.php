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

Route::get('/', 'PagesController@index');

Route::get('/clogin', 'PagesController@clogin');

Route::get('/about/{id}/{name}', function ($id, $name) {
    return view('This is user '. $name. ' with an id of '. $id);
});
Route::get('/dashboard', 'HomeController@index');
Route::resource('posts', 'PostsController');
Route::post('add-educ', 'EducController@store');
Route::post('add-work', 'WorkController@store');
Route::post('add-mem', 'MembershipController@store');
Route::post('add-achieve', 'AchievementController@store');
Route::post('add-skill', 'SkillController@store');
Route::post('add-link', 'LinkController@store');
Route::post('add-about-me', 'ResumeController@addAboutMe');

Route::get('/Classic/{url}', 'ResumeController@viewResume1');
Route::get('/Creative/{url}', 'ResumeController@viewResume2');
Auth::routes();
