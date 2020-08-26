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
// user routes for website
Route::get('/', 'User\HomeController@index');
Route::get('terms-conditions', 'User\HomeController@TermsAndCondition');
Route::get('privacy-policy', 'User\HomeController@PrivacyPolicy');
Route::post('user/login', 'Auth\LoginController@login')->name('login:user');
Route::get('user/logout', 'Auth\LoginController@logout');
Route::get('generate-password/{token}', 'User\UserController@generatePassword')->name('generate-password');
Route::post('generate-password/{token}', 'User\UserController@generatePassword')->name('generate-password');

Route::get('email-verification/{code}', 'User\UserController@emailVerification')->name('email-verification');
Route::post('user/signup', 'User\UserController@signup');
Route::get('user/dashboard', 'User\Dashboardcontroller@Index')->middleware('auth:user');
Route::get('user/explore-data', 'User\Dashboardcontroller@ExploreData')->middleware('auth:user');
Route::get('user/explore-all-data', 'User\Dashboardcontroller@ExploreAllData')->middleware('auth:user');
Route::get('user/sample-detail/{sample_id}', 'User\Dashboardcontroller@SampleDetail')->name('sample-detail')->middleware('auth:user');
Route::get('user/public-sample-detail/{sample_id}', 'User\Dashboardcontroller@PublicSampleDetail')->name('public-sample-detail')->middleware('auth:user');

Route::get('user/activate-kit', 'User\Dashboardcontroller@ActivateKit')->middleware('auth:user');
Route::post('user/activate-kit', 'User\Dashboardcontroller@ChnageKitStatus')->middleware('auth:user');
Route::get('user/profile', 'User\UserController@UserProfile')->middleware('auth:user');
Route::post('user/update-profile', 'User\UserController@UpdateProfile')->middleware('auth:user');
// End user route for website

// user route for admin
Route::get('admin/', 'Auth\LoginController@index')->middleware('guest:admin');
Route::get('admin/logout', 'Auth\LoginController@logout');
Route::get('admin/home', 'Admin\HomeController@index')->middleware('auth:admin');
Route::get('admin/profile-setting', 'Admin\SettingController@index')->middleware('auth:admin');
Route::get('admin/change-password', 'Admin\SettingController@ChangePaaword')->middleware('auth:admin');
Route::get('admin/add-user', 'Admin\UserController@Addnew')->middleware('auth:admin');
Route::get('admin/users', 'Admin\UserController@index')->middleware('auth:admin');
Route::get('admin/user-edit/{user_id}', 'Admin\UserController@Edituser')->name('user-edit')->middleware('auth:admin');
Route::get('admin/contact-us', 'Admin\HomeController@ContactUs')->middleware('auth:admin');
// end user route for admin
// taxanomy management for admin
Route::get('admin/taxonomy', 'Admin\TaxanomyManagementController@Index')->middleware('auth:admin');

Route::post('admin/taxonomy/upload', 'Admin\TaxanomyManagementController@Upload')->middleware('auth:admin');

Route::get('admin/taxonomy/edit/{id}', 'Admin\TaxanomyManagementController@Edit')->middleware('auth:admin');
Route::post('admin/taxonomy/edit', 'Admin\TaxanomyManagementController@Edit')->middleware('auth:admin');
//End taxanomy management for admin

// lab executive route for admin
Route::get('admin/add-labexecutive', 'Admin\Labexecutive@Addnew')->middleware('auth:admin');
Route::post('admin/add-labexecutive', 'Admin\Labexecutive@Adduser')->middleware('auth:admin');
Route::get('admin/labexecutives', 'Admin\Labexecutive@index')->middleware('auth:admin');
Route::get('admin/labexecutive-edit/{user_id}', 'Admin\Labexecutive@Edituser')->name('labexecutive-edit')->middleware('auth:admin');
Route::post('admin/labexecutive-edit/{user_id}', 'Admin\Labexecutive@Edituser')->name('labexecutive-edit')->middleware('auth:admin');
Route::get('labexecutive/generate-password/{token}', 'Admin\Labexecutive@generatepassword')->name('labexecutive/generate-password');
Route::post('labexecutive/generate-password/{token}', 'Admin\Labexecutive@generatepassword')->name('labexecutive/generate-password');
// lab executive route for admin

// kit management for admin
Route::get('admin/kit', 'Admin\KitController@Index')->middleware('auth:admin');
Route::get('admin/add-kit', 'Admin\KitController@Addnew')->middleware('auth:admin');
Route::post('admin/add-kit', 'Admin\KitController@Addkit')->middleware('auth:admin');
Route::post('admin/kits/upload', 'Admin\KitController@UploadKit')->middleware('auth:admin');

Route::get('admin/kit-edit/{kit_id}', 'Admin\KitController@Editkit')->name('kit-edit')->middleware('auth:admin');
Route::post('admin/kit-edit/{kit_id}', 'Admin\KitController@Editkit')->name('kit-edit')->middleware('auth:admin');
// end kit management for admin

Route::post('admin/change-password', 'Admin\SettingController@ChangePaaword')->middleware('auth:admin');
Route::post('admin/login', 'Auth\LoginController@login')->name('login:admin');
Route::post('admin/update-profile', 'Admin\SettingController@UpdateProfile')->middleware('auth:admin');
Route::post('admin/add-user', 'Admin\UserController@Adduser')->middleware('auth:admin');
Route::post('admin/user-edit/{user_id}', 'Admin\UserController@Edituser')->name('user-edit')->middleware('auth:admin');
;

// lab executive routes
Route::get('labexecutive/sample', 'Labexecutive\SampleController@Index')->middleware('auth:admin');

Route::get('labexecutive/sample-edit/{sample_id}', 'Labexecutive\SampleController@EditSample')->name('sample-edit')->middleware('auth:admin');

Route::get('labexecutive/sample-report/{sample_id}', 'Labexecutive\SampleController@SampleReport')->middleware('auth:admin');

Route::get('labexecutive/sample-report-edit/{sample_id}', 'Labexecutive\SampleController@EditSampleReport')->middleware('auth:admin');
Route::post('labexecutive/sample-report-edit/{sample_id}', 'Labexecutive\SampleController@EditSampleReport')->middleware('auth:admin');

Route::post('labexecutive/sample-edit', 'Labexecutive\SampleController@EditSample')->name('sample-edit')->middleware('auth:admin');

Route::post('/labexecutive/samplereport/upload', 'Labexecutive\SampleController@UploadSampleReport')->middleware('auth:admin');
// end lab executive routes


Auth::routes();