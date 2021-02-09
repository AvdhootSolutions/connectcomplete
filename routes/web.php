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
Route::resource('/crews','EmployeeController');
Route::resource('/executives','ExecutiveController');
Route::get('/assignCategory/{id}','ExecutiveController@assignCategory')->name('assignCategory');
Route::post('/assignCategory/store','ExecutiveController@assignCategoryStore')->name('assigncategory.store');
Route::post('/searchExecutive','ExecutiveController@searchExecutive')->name('searchExecutive');
Route::delete('/executiveCategoryDelete/{id}','ExecutiveController@executiveCategoryDelete')->name('executiveCategoryDelete');

/*-----------Assign  Employee Category */

Route::get('/assignCrewsCategory/{id}','EmployeeController@assignEmployeesCategory')->name('assignCrewsCategory');
Route::post('/assignCrewsCategory/store','EmployeeController@assignEmployeesCategoryStore')->name('assignCrewsCategory.store');
Route::delete('/employeeCategoryDelete/{id}','EmployeeController@employeeCategoryDelete')->name('employeeCategoryDelete');
Route::post('/searchEmployee','EmployeeController@searchEmployee')->name('searchEmployee');



/* Ajax Route */

Route::get('/getsubcategory','ChildCategoriesController@getSubCategory')->name('getsubcategory');
Route::get('/getchildcategory','ChildCategoriesController@getChildCategory')->name('getchildcategory');
Route::get('/getcity','AreasController@getCity')->name('getcity');
Route::get('/getareas','AreasController@getAreas')->name('getareas');
});
