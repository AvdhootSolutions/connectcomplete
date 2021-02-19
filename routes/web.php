<?php
 
use Illuminate\Support\Facades\Route;

 

Route::get('/', function () {
    //return redirect()->route('login');

     
	if(Auth()->user()!=''){
		 if (Auth()->user()->hasAnyRole(['cityadmin', 'admin'])) {
           
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

/*------------gallery        -----------------*/
	Route::get('/childcategories/gallery/{id}','ChildCategoriesController@gallery')->name('childcategories.gallery');
	Route::get('/childcategories/addgallery/{id}','ChildCategoriesController@addgallery')->name('childcategories.addgallery');
	Route::post('/childcategories/storegallery','ChildCategoriesController@storegallery')->name('childcategories.store.gallery');
	Route::delete('/childcategories/deletegallery/{id}','ChildCategoriesController@deletegallery')->name('childcategories.gallery.delete');


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


Route::resource('/individualusers','IndividualUserController');
Route::post('/individualusers/updateStatus','IndividualUserController@updateStatus')->name('individualusers.updateStatus');
Route::post('/searchIndividual','IndividualUserController@searchIndividual')->name('searchIndividual');
Route::post('/searchCorporate','CorporateUserController@searchCorporate')->name('searchCorporate');
Route::post('/corporateusers/updateStatus','CorporateUserController@updateStatus')->name('corporateusers.updateStatus');
Route::resource('/corporateusers','CorporateUserController');
Route::resource('/individualinquiry','IndividualInquiryController');
Route::resource('/corporateinquiry','CorporateInquiryController');





/* assign individual inquiries */

Route::get('/assignexecutiveinquiry/{id}/{cat_id}/{subcat_id}/{area_id}','AssignExecutiveInquiryController@assignExecutiveInquiry')->name('assignexecutiveinquiry');
Route::post('/storeAssignExecutiveinquiry',
	'AssignExecutiveInquiryController@storeAssignExecutiveinquiry')->name('storeAssignExecutiveinquiry');
Route::delete('/deleteExecutiveInquiry/{id}','AssignExecutiveInquiryController@deleteExecutiveInquiry')->name('deleteExecutiveInquiry');



Route::get('/assigncrewsinquiry/{id}/{cat_id}/{subcat_id}/{area_id}','AssignCrewsInquiryController@assignCrewsinquiry')->name('assigncrewsinquiry');
Route::post('/storeAssignCrewsinquiry',
	'AssignCrewsInquiryController@storeAssignCrewsinquiry')->name('storeAssignCrewsinquiry');
Route::delete('/deletecrewInquiry/{id}','AssignCrewsInquiryController@deleteCrewInquiry')->name('deletecrewInquiry');



/***** assign Crew Inquiries ******/
Route::get('/assignCorporateExecutiveinquiry/{id}/{cat_id}/{subcat_id}/{area_id}','AssignCorporateExecutiveInquiryController@assignCorporateExecutiveinquiry')->name('assignCorporateExecutiveinquiry');
Route::post('/storeAssignCorporateExecutiveinquiry',
	'AssignCorporateExecutiveInquiryController@storeAssignCorporateExecutiveinquiry')->name('storeAssignCorporateExecutiveinquiry');
Route::delete('/deleteCorporateExecutiveInquiry/{id}','AssignCorporateExecutiveInquiryController@deleteCorporateExecutiveInquiry')->name('deleteCorporateExecutiveInquiry');




Route::get('/assignCorporateCrewsinquiry/{id}/{cat_id}/{subcat_id}/{area_id}','AssignCorporateCrewInquiryController@assignCorporateCrewsinquiry')->name('assignCorporateCrewsinquiry');
Route::post('/storeAssignCorporateCrewsinquiry',
	'AssignCorporateCrewInquiryController@storeAssignCorporateCrewsinquiry')->name('storeAssignCorporateCrewsinquiry');
Route::delete('/deleteCorporatecrewInquiry/{id}','AssignCorporateCrewInquiryController@deleteCorporatecrewInquiry')->name('deleteCorporatecrewInquiry');



/***City based assign category****/
Route::get('assigncitiycategory/{id}','AssignCategoryController@assignCitiyCategory')->name('assigncitiycategory');
Route::post('assignCitycategory/store','AssignCategoryController@store')->name('assignCitycategory.store');
Route::delete('/citycategoryDelete/{id}','AssignCategoryController@delete')->name('citycategoryDelete');




Route::resource('/blogs','BlogsController');

Route::resource('/banners','BannerController');
Route::resource('/featuredimages','FeaturedImagesController');
Route::resource('/pagecontent','PagesController');
/* Ajax Route */

Route::get('/getsubcategory','ChildCategoriesController@getSubCategory')->name('getsubcategory');
Route::get('/getchildcategory','ChildCategoriesController@getChildCategory')->name('getchildcategory');
Route::get('/getcity','AreasController@getCity')->name('getcity');
Route::get('/getareas','AreasController@getAreas')->name('getareas');
});
