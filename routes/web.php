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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/', 'HomeController@showLogin')->name('login');
Route::post("/login", "AccountController@login")->name("admin.login");
//Logout the administrator
Route::get("/logout", "AccountController@logout")->name("admin.logout");

Route::group(["prefix" => "admin"], function(){
    Route::get("/dashboard", "AdministratorController@show")->name("admin.dashboard");

    Route::group(["prefix" => "coursecategory"], function(){

        Route::get("/create", "CourseCategoryController@index")->name("coursecategory.index");
        Route::post("/save", "CourseCategoryController@store")->name("coursecategory.store");
        Route::get("/delete/{id}", "CourseCategoryController@destroy")->name("coursecategory.delete");

    });

    Route::group(["prefix" => "course"], function(){
    	
        Route::get("/create", "CourseController@index")->name("course.index");
        Route::post("/save", "CourseController@store")->name("course.store");
        Route::get("/delete/{id}", "CourseController@destroy")->name("course.delete");

    });

    Route::group(["prefix" => "partner"], function(){
    	
        Route::get("/create", "PartnerController@index")->name("partner.index");
        Route::post("/save", "PartnerController@store")->name("partner.store");
        Route::get("/delete/{id}", "PartnerController@destroy")->name("partner.delete");
        Route::get("/addstaff/{id}", "PartnerController@staff")->name("partner.staff");

    });

    Route::group(["prefix" => "allocation"], function(){
    	
        Route::get("/partnercourse/{id}", "AllocationController@courseallocation")->name("allocate");
        Route::post("/save", "AllocationController@store")->name("allocate.store");
        Route::get("/delete/{id}", "AllocationController@destroy")->name("allocate.delete");
        Route::get("/courselist/{id}", "AllocationController@partnerCourse")->name("allocate.courselist");

    });

     Route::group(["prefix" => "user"], function(){
    	
        Route::get("/create", "UserController@index")->name("user.create");
        Route::post("/save", "UserController@store")->name("user.save");
        Route::get("/delete/{id}", "UserController@destroy")->name("user.delete");

        

    });
});
