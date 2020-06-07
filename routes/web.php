<?php


use Illuminate\Support\Facades\Route;




 Route::get('/',"WelcomeController@index")->name('welcome');

 Route::post('/contactUs',"WelcomeController@ContactUs")->name('ContactUs');

 Route::get('/category/{id}',"WelcomeController@category")->name('categoryId');

 Route::get('/book/search',"WelcomeController@search")->name('search_book');



Route::group(['middleware' => 'auth'],function(){



     Route::get('/book/{id}',"StudentController@book_reservation")->name('book_reservation');

     Route::post("book/addlike/{book_id}","StudentController@addLike")->where('book_id', '[0-9]+');
     Route::put("book/dislike/{book_id}","StudentController@disLike")->where('book_id', '[0-9]+');

     Route::post('/reservation_submit/{id}',"StudentController@reservation_submit")->name('reservation_submit');
     Route::post('/reservation_cancel/{id}',"StudentController@reservation_cancel")->name('reservation_cancel');

     Route::get('/student/books',"StudentController@student_books")->name('student_books');


     Route::get('/logout',"StudentAcountController@logout")->name('welcome.logout');

     Route::get('/profile',"StudentController@profile")->name('welcome.profile');



 });

Route::group(['middleware' => 'guest'],function(){

 Route::get('/login',"StudentAcountController@login")->name('welcome.login');

 Route::post('/login',"StudentAcountController@loginSubmit")->name('welcome.loginSubmit');

});







