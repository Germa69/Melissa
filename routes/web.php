<?php

use Illuminate\Support\Facades\Route;

// TODO: BACKEND

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'CheckAdminSession'], function () {
        Route::get('view_login', 'LoginController@view_login')->name('view_login');
        Route::post('process_login', 'LoginController@process_login')->name('process_login');
    });

    Route::get('logout','LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'CheckAdminLogin'], function (){
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'Controller@dashboard')->name('dashboard');
        Route::get('/dashboard_dark', 'Controller@dashboard_dark')->name('dashboard_dark');

        Route::group(['prefix' => 'car', 'as' => 'car.'], function (){
            Route::get('/', 'CarController@view_all')->name('view_all');
            Route::get('view_insert', 'CarController@view_insert')->name('view_insert');
            Route::post('process_insert', 'CarController@process_insert')->name('process_insert');

            Route::group(['middleware' => 'CheckSuperAdminLogin'], function (){
                route::get('view_update/{ma}', 'CarController@view_update')->name('view_update');
                route::post('process_update/{ma}', 'CarController@process_update')->name('process_update');
                route::post('delete', 'CarController@delete')->name('delete');
            });
        });

        Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
            Route::get('/', 'BrandController@view_all')->name('view_all');
            Route::get('view_insert', 'BrandController@view_insert')->name('view_insert');
            Route::post('process_insert', 'BrandController@process_insert')->name('process_insert');

            Route::group(['middleware' => 'CheckSuperAdminLogin'], function (){
                Route::get('view_update/{ma}', 'BrandController@view_update')->name('view_update');
                Route::post('process_update/{ma}', 'BrandController@process_update')->name('process_update');
                Route::post('delete', 'BrandController@delete')->name('delete');
            });
        });

        Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
            Route::get('/', 'CustomerController@view_all')->name('view_all');
            Route::get('active/{ma}', 'CustomerController@active')->name('active');
            Route::get('inactive/{ma}', 'CustomerController@inactive')->name('inactive');
        });

        Route::group(['prefix' => 'contract', 'as'=> 'contract.'], function () {
            Route::get('/', 'ContractController@manage_contract')->name('manage_contract');
            Route::get('update-contract/{ma}', 'ContractController@update_contract')->name('update_contract');
            Route::post('update-status-contract' , 'ContractController@update_status_contract')->name('update_status_contract');
            Route::post('update-date-contract' , 'ContractController@update_date_contract')->name('update_date_contract');
        });

        Route::group(['prefix'=> 'user', 'as'=> 'user.'],function () {
            Route::get('profile/{ma}', 'AdminController@profile')->name('profile');
            Route::post('profile_update/{ma}', 'AdminController@profile_update')->name('profile_update');

            Route::group(['middleware' => 'CheckSuperAdminLogin'], function () {
                Route::get('/', 'AdminController@view_all')->name('view_all');
                Route::get('view_insert', 'AdminController@view_insert')->name('view_insert');
                Route::post('process_insert', 'AdminController@process_insert')->name('process_insert');

                Route::get('view_update/{ma}', 'AdminController@view_update')->name('view_update');
                Route::post('process_update/{ma}', 'AdminController@process_update')->name('process_update');
                Route::post('reissue_password', 'AdminController@reissue_password')->name('reissue_password');
                Route::post('delete', 'AdminController@delete')->name('delete');
            });

        });
    });
});

// TODO: FRONTEND


Route::get('/', 'HomeController@home_page')->name('home_page');
Route::get('fleet', 'HomeController@fleet')->name('fleet');

Route::group(['prefix'=> 'pages', 'as' => 'pages.'], function() {
    Route::get('blog','PageController@blog')->name('blog');
    Route::get('blog_detail','PageController@blog_detail')->name('blog_detail');
    Route::get('about_us','PageController@about_us')->name('about_us');
    Route::get('team', 'PageController@team')->name('team');
    Route::get('terms', 'PageController@terms')->name('terms');
    Route::get('contact', 'PageController@contact')->name('contact');
    Route::get('fleet', 'PageController@fleet')->name('fleet');
    Route::get('car_detail','CarController@car_detail')->name('car_detail');
});


Route::group(['prefix'=> 'customer', 'as' => 'customer.'], function() {
    Route::get('login', 'CustomerController@login')->name('login');
    Route::post('process_login', 'CustomerController@process_login')->name('process_login');
    Route::get('logout', 'CustomerController@logout')->name('logout');

    Route::get('register', 'CustomerController@register')->name('register');
    Route::post('process_register','CustomerController@process_register')->name('process_register');
    Route::post('confirm-booking', 'ContractController@confirm_booking')->name('confirm_booking');

    Route::group(['middleware' => 'CheckCustomerLogin'], function (){
        Route::get('profile/{ma}', 'CustomerController@profile')->name('profile');
        Route::post('profile_update/{ma}', 'CustomerController@profile_update')->name('profile_update');
        Route::post('password_update/{ma}', 'CustomerController@password_update')->name('password_update');
        Route::post('image_update', 'CustomerController@image_update')->name('image_update');
    });
});

$controller = 'CustomerController';

Route::group(['prefix'=>'view_khach_hang', 'as'=>'view_khach_hang.'], function() use ($controller){
    Route::get('about_us','$controller@about_us')->name('about_us');
    Route::get('blog_post_details','$controller@blog_post_details')->name('blog_post_details');
    Route::get('blog_posts','$controller@blog_posts')->name('blog_posts');
    Route::get('contact','$controller@contact')->name('contact');
    Route::get('fleet','$controller@fleet')->name('fleet');
    Route::get('','CustomerController@header')->name('header');
    Route::get('offers','$controller@offers')->name('offers');
    Route::get('team','$controller@team')->name('team');
    Route::get('terms','$controller@terms')->name('terms');
    Route::get('testimonials','$controller@testimonials')->name('testimonials');


    route::get('hop_dong','$controller@hop_dong')->name('hop_dong');

    route::get('view_all','$controller@view_all')->name('view_all');

    Route::get('get_info_customer','$controller@get_info_customer')->name('get_info_customer');
    Route::post('process_info_customer','$controller@process_info_customer')->name('process_info_customer');
});


