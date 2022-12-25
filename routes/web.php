<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Guest\ReservationController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/','HomeController@index')->name('home');
Route::get('/room','HomeController@room')->name('room');
Route::get('/restaurant','HomeController@restaurant')->name('restaurant');
Route::get('/room/details/{id}','HomeController@single')->name('single');
Route::get('/search','SearchController@search')->name('search');
Route::get('/category/rooms/{slug}','HomeController@categoryrooms')->name('categoryrooms');
Route::get('/booking/{id}', 'BookingController@index')->name('booking');

Route::get('/payment', 'BookingController@payment')->name('payment');
Route::post('/store/{id}', 'BookingController@store')->name('store');
Route::get('/show', 'BookingController@show')->name('show');

Route::get('/contact','ContactController@contact')->name('contact');
Route::post('/contact/store','ContactController@store')->name('contact.store');

Auth::routes();

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('category','CategoryController');
    Route::resource('facility','FacilityController');
    Route::resource('room','RoomController');
    
    Route::get('/reservations', 'ReservationController@index')->name('reservations');
    Route::get('/reservation/{id}/show', 'ReservationController@show')->name('reservation.show');
    Route::delete('/reservation/{id}/delete', 'ReservationController@destroy')->name('reservation.delete');

    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::get('/contact/{id}/show', 'ContactController@show')->name('contact.show');
    Route::post('/contact/{id}/status', 'ContactController@status')->name('contact.status');
    Route::delete('/contact/{id}/delete', 'ContactController@destroy')->name('contact.destroy');

    Route::get('/notifications', 'NotificationController@index')->name('notification.index');
    Route::get('/notifications/create', 'NotificationController@create')->name('notification.create');
    Route::post('/notifications/store', 'NotificationController@store')->name('notification.store');
    Route::get('/notifications/{id}/show', 'NotificationController@show')->name('notification.show');
    Route::get('/notifications/{id}/edit', 'NotificationController@edit')->name('notification.edit');
    Route::put('/notifications/{id}/update', 'NotificationController@update')->name('notification.update');
    Route::delete('/notifications/{id}/delete', 'NotificationController@destroy')->name('notification.destroy');
    
});

Route::group(['as' => 'client.', 'prefix' => 'client', 'namespace' => 'Guest', 'middleware' => ['auth', 'client']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/reservations', 'ReservationController@index')->name('reservations');
    Route::delete('/reservation/{id}/delete', 'ReservationController@destroy')->name('reservation.destroy');
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::put('/settings/update', 'SettingsController@update')->name('settings.update');
    Route::get('/notifications', 'NotificationController@index')->name('notifications');
}); 
