
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

Route::get('backend/admin/login', 'Backend\LoginController@index')->name('login-backend');
Route::post('backend/admin/login', 'Backend\LoginController@check')->name('login-backend-check');

Route::prefix('backend/admin')->middleware(['admin'])->group(function () {
    Route::get('/', 'Backend\HomeController@index')->name('admin');
    Route::get('logout', 'Backend\HomeController@logout')->name('admin-logout');
    
    Route::get('profesion/parent', 'Backend\ProfesionController@parent')->name('parent-profesion');
    Route::get('profesion/parent/add', 'Backend\ProfesionController@parent_add')->name('backend-add-parent-profesion');
    Route::post('profesion/parent/add', 'Backend\ProfesionController@parent_add_store')->name('backend-add-parent-profesion-store');
	Route::get('profesion/parent/edit/{id}', 'Backend\ProfesionController@parent_add_edit')->name('backend-add-parent-profesion-edit');
	Route::post('profesion/parent/edit/{id}', 'Backend\ProfesionController@parent_add_edit_save')->name('backend-add-parent-profesion-edit-store');
	Route::get('profesion/delete/{id}', 'Backend\ProfesionController@parent_delete')->name('backend-add-parent-profesion-destroy');
	

	Route::get('profesion/child', 'Backend\ProfesionController@child')->name('child-profesion');
    Route::get('profesion/child/add', 'Backend\ProfesionController@child_add')->name('backend-add-child-profesion');
    Route::post('profesion/child/add', 'Backend\ProfesionController@child_add_store')->name('backend-add-child-profesion-store');
	Route::get('profesion/child/edit/{id}', 'Backend\ProfesionController@child_add_edit')->name('backend-add-child-profesion-edit');
	Route::post('profesion/child/edit/{id}', 'Backend\ProfesionController@child_add_edit_save')->name('backend-add-child-profesion-edit-store');
	Route::get('profesion/child/delete/{id}', 'Backend\ProfesionController@child_delete')->name('backend-add-child-profesion-destroy');
});

Route::get('/', 'HomeController@index')->name('home');

Route::post('upload/image/gallery', 'UploadImageController@gallery')->middleware('auth');

Route::get('search/school', 'Auth\EducationController@school');

Route::get('profesion/title', 'Auth\UserController@title');

Route::post('make/post', 'PostController@store')->middleware('auth');
Route::post('forgot-password', 'Auth\LoginController@forgotPassword');
Route::get('reset/password/{token}/{email}', 'Auth\LoginController@resetPassword');
Route::post('reset/password', 'Auth\LoginController@setNewPassword');
Route::get('home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@check_login')->name('post-login');

Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@check_register')->name('post-register');

Route::get('logout', 'Auth\LogoutController@index')->name('logout');

Route::get('profile/user', 'Auth\UserController@profile')->name('profile')->middleware('auth');
Route::get('profile/user/edit', 'Auth\UserController@profile_edit')->name('edit-profile')->middleware('auth');
Route::post('profile/user/edit', 'Auth\UserController@save_edit')->name('save-edit-profile')->middleware('auth');

Route::get('user/new/password', 'Auth\UserController@set_new_password')->name('set-user-password')->middleware('auth');
Route::post('user/new/password', 'Auth\UserController@save_new_password')->middleware('auth');

Route::get('place/regencyAjax/{province_id}', 'PlaceController@regencyAjax')->name('place-regency-ajax');
Route::get('place/districtAjax/{regency_id}', 'PlaceController@districtAjax')->name('place-district-ajax');

Route::get('education/create', 'Auth\EducationController@create')->name('education-create')->middleware('auth');
Route::post('education/create', 'Auth\EducationController@store')->name('education-save')->middleware('auth');

Route::get('education/edit/{id}', 'Auth\EducationController@put')->name('education-create')->middleware('auth');
Route::post('education/edit/{id}', 'Auth\EducationController@putStore')->name('education-create')->middleware('auth');

Route::get('education/delete/{id}', 'Auth\EducationController@delete')->name('education-create')->middleware('auth');

Route::get('category/job/child/{parent_id}', 'Auth\JobController@child_category');
Route::get('job/create', 'Auth\JobController@create')->name('job-create')->middleware('auth');
Route::post('job/create', 'Auth\JobController@store')->name('job-store')->middleware('auth');

Route::get('job/all', 'Auth\JobController@list_job_all')->name('list-job-all');
Route::get('job/list/ajax', 'Auth\JobController@list_job_ajax')->name('list-job-all-ajax');
Route::get('job/detail/{id}', 'Auth\JobController@detail_job')->name('detail-job');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('experience/create', 'Auth\ExperienceController@create')->name('experience-create')->middleware('auth');
Route::post('experience/create', 'Auth\ExperienceController@store')->name('experience-save')->middleware('auth');

Route::get('experience/edit/{id}', 'Auth\ExperienceController@edit')->name('experience-edit')->middleware('auth');
Route::post('experience/edit/{id}', 'Auth\ExperienceController@save_edit')->name('experience-save-edit')->middleware('auth');

Route::get('experience/delete/{id}', 'Auth\ExperienceController@delete')->name('experience-create')->middleware('auth');

Route::post('upload/document', 'Auth\ExperienceController@upload_document')->name('experience-upload-document')->middleware('auth');

Route::get('search/people', 'SearchController@people');
Route::get('user/profile/{id}', 'UserController@profile');

Route::get('notification', 'NotificationController@list')->middleware('auth');

Route::post('connect', 'RelationshipController@connect')->name('create-relation')->middleware('auth');
Route::post('follow', 'RelationshipController@follow')->name('create-follow')->middleware('auth');

Route::get('confirm/connect/{id}', 'RelationshipController@confirmConnect')->middleware('auth');
Route::post('confirm/connect/{id}', 'RelationshipController@confirmConnectSubmit')->middleware('auth');
