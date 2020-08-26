<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([], function(){
	Route::post('check-email-exist', 'User\UserController@CheckEmail');
	Route::post('contact-us', 'User\HomeController@ContactUs');
});
Route::group(['middleware'	=>	['web','auth:user']], function(){
	Route::get('sampledetail', 'User\Dashboardcontroller@SampledetailByAttribute');
	Route::post('edit-sample-detail', 'User\Dashboardcontroller@EditSampleDetail');
	Route::get('get-spices-name', 'User\Dashboardcontroller@GetSpicesName');
	Route::get('get-filtered-sample', 'User\Dashboardcontroller@GetFilteredSample');
});
Route::group(['middleware'	=>	['web','auth:admin']], function(){
	Route::get('userlist', 'Admin\UserController@userlist');
	Route::get('userstatus', 'Admin\UserController@ChnageUserStatus');
	Route::get('labesecutivelist', 'Admin\Labexecutive@userlist');
	Route::get('kitlist', 'Admin\KitController@kitlist');
	Route::get('deletekit', 'Admin\KitController@DeleteKit');
	Route::get('labexecutive/samplelist', 'Labexecutive\SampleController@SampleList');
	Route::get('labexecutive/change-sample-status', 'Labexecutive\SampleController@ChnageSampleStatus');
	Route::get('taxanomylist', 'Admin\TaxanomyManagementController@TaxanomyList');
	Route::get('deletetaxanomy', 'Admin\TaxanomyManagementController@DeleteTaxanomy');
	Route::get('contact-list', 'Admin\HomeController@ContactList');
	Route::post('reply-contact-us', 'User\HomeController@ReplyContactUs');
});