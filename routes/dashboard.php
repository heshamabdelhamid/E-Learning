<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'eldashboard'],function(){

   // Config(['auth.defaults.guard' => 'admin']);

	Config::set('auth.defaults.guard','admin');


Route::group(['middleware' => 'authAdmin:admin'],function(){






	Route::group(['namespace' => 'Dashboard'],function(){

	    Route::get('/',"DashboardController@index")->name('Dashboard');

		Route::resource('categories','CategoryController')->except('show');

		Route::resource('books','BooksController')->except('show');

		Route::resource('admins','AdminsController')->except(['show']);
		Route::resource('staff','StaffController')->except('show');
		Route::resource('reservations','ReservationsController')->except(['show','create','store']);
		Route::resource('students','StudentsController')->except('show');




    });


  Route::get('logout',"Dashboard\AdminAcountController@logout")->name('admin.logout');

});


Route::group(['middleware' => 'redirectAdmin:admin'],function(){
	  Route::get('login',"Dashboard\AdminAcountController@login")->name('admin.login');

	});

Route::POST('login',"Dashboard\AdminAcountController@loginSubmit")->name('admin.loginSubmit');

});
