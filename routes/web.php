<?php

use Illuminate\Support\Facades\Route;

 

Route::get('/', function () {
    //return redirect()->route('login');
	if(Auth()->user()!=''){
		 if (Auth()->user()->hasAnyRole(['superadmin', 'admin'])) {
           
            return redirect('home');
        }
	} else {
	    return view('auth.login');
	}

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'],'namespace' => 'App\Http\Controllers'], function() {

Route::resource('/categories','CategoriesController');
Route::resource('/subcategories','SubCategoriesController');
Route::resource('/childcategories','ChildCategoriesController');



Route::resource('/corportatecategories','CorporateCategoriesController');
Route::resource('/corportatesubcategories','CorporateSubCategoriesController');
Route::resource('/corportatechildcategories','CorporateChildCategoriesController');



Route::resource('/users','UserController');
Route::resource('/states','StateController');
Route::resource('/cities','CityController');
Route::resource('/areas','AreasController');
Route::resource('/employees','EmployeeController');


/* Ajax Route */

Route::get('/getsubcategory','ChildCategoriesController@getSubCategory')->name('getsubcategory');
Route::get('/getcity','AreasController@getCity')->name('getcity');
Route::get('/getareas','AreasController@getAreas')->name('getareas');
});
