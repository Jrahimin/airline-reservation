<?php


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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


Auth::routes();

Route::get('/home', ['as'=>'home', 'uses' => 'HomeController@index']);

// Home
Route::get('/', 'HomeController@index')->name('index');
Route::get('/trip/search', 'HomeController@search')->name('search_trip');


// Ticket Booking
Route::get('/booking/passenger-details', 'TicketBookingController@passengerDetails')->name('passenger_details');
Route::post('/booking/passenger-details/post', 'TicketBookingController@passengerDetailsPost')->name('passenger_details_post');

// Users
Route::get('/user/all', 'UserController@all')->name('view_all_user')->middleware('company_user');
Route::get('/user/add', 'UserController@add')->name('add_user')->middleware('company_user:admin');
Route::post('/user/add', 'UserController@addPost')->name('add_user_post')->middleware('company_user:admin');
Route::get('/user/edit/{user}', 'UserController@edit')->name('edit_user')->middleware('company_user:admin');
Route::post('/user/edit/{user}', 'UserController@editPost')->name('edit_user_post')->middleware('company_user:admin');
Route::post('/user/delete', 'UserController@delete')->name('delete_user')->middleware('company_user:admin');


// Port
Route::get('/port/all', 'PortController@all')->name('view_all_port')->middleware('admin');
Route::get('/port/add', 'PortController@add')->name('add_port')->middleware('admin');
Route::post('/port/add', 'PortController@addPost')->name('add_port_post')->middleware('admin');
Route::get('/port/edit/{port}', 'PortController@edit')->name('edit_port')->middleware('admin');
Route::post('/port/edit/{port}', 'PortController@editPost')->name('edit_port_post')->middleware('admin');
Route::post('/port/delete', 'PortController@delete')->name('delete_port')->middleware('admin');


// Passenger Type
Route::get('/passenger-type/all', 'PassengerTypeController@all')->name('view_all_passenger_type')->middleware('admin');
Route::get('/passenger-type/add', 'PassengerTypeController@add')->name('add_passenger_type')->middleware('admin');
Route::post('/passenger-type/add', 'PassengerTypeController@addPost')->name('add_passenger_type_post')->middleware('admin');
Route::get('/passenger-type/edit/{type}', 'PassengerTypeController@edit')->name('edit_passenger_type')->middleware('admin');
Route::post('/passenger-type/edit/{type}', 'PassengerTypeController@editPost')->name('edit_passenger_type_post')->middleware('admin');
Route::post('/passenger-type/delete', 'PassengerTypeController@delete')->name('delete_passenger_type')->middleware('admin');


// Ferry
Route::get('/ferry/all', 'FerryController@all')->name('view_all_ferry')->middleware('company_user');
Route::get('/ferry/add', 'FerryController@add')->name('add_ferry')->middleware('company_user:admin');
Route::post('/ferry/add', 'FerryController@addPost')->name('add_ferry_post')->middleware('company_user:admin');
Route::get('/ferry/edit/{ferry}', 'FerryController@edit')->name('edit_ferry')->middleware('company_user:admin');
Route::post('/ferry/edit/{ferry}', 'FerryController@editPost')->name('edit_ferry_post')->middleware('company_user:admin');
Route::post('/ferry/delete', 'FerryController@delete')->name('delete_ferry')->middleware('company_user:admin');


// Trip
Route::get('/trip/all', 'TripController@all')->name('view_all_trip')->middleware('company_user');
Route::get('/trip/add', 'TripController@add')->name('add_trip')->middleware('company_user:admin');
Route::post('/trip/add', 'TripController@addPost')->name('add_trip_post')->middleware('company_user:admin');
Route::post('/trip/delete', 'TripController@delete')->name('delete_trip')->middleware('company_user:admin');
Route::get('/trip/edit/{trip}', 'TripController@edit')->name('edit_trip')->middleware('company_user:admin');
Route::post('/trip/edit/{trip}', 'TripController@editPost')->name('edit_trip_post')->middleware('company_user:admin');


//JR Routes...
//TicketBookingController
Route::post('/booking/ticket_store', 'TicketBookingController@storeTicket')->name('ticketStore');
Route::get('/booking/success', 'TicketBookingController@storeTicket')->name('success');

//TicketObserveController
Route::get('/ticket/all', 'TicketObserveController@getAllTicket')->name('all_ticket')->middleware('company_user');
Route::get('/ticket/view_order/{ticket}', 'TicketObserveController@viewOrder')->name('view_ticket_order')->middleware('company_user');
Route::post('/ticket/delete', 'TicketObserveController@delete')->name('delete_ticket')->middleware('company_user:admin');

//OrderController
Route::get('/order/all', 'OrderController@allOrder')->name('all_order')->middleware('company_user');
Route::post('/order/delete', 'OrderController@delete')->name('delete_order')->middleware('company_user:admin');
Route::get('/order/view_ticket/{order}', 'TicketObserveController@getTicketForOrder')->name('view_ticket')->middleware('company_user');
Route::get('/order/print/{order}', 'OrderController@orderPrint')->name('order_print')->middleware('company_user');
Route::get('/trip/view_order/{trip}', 'OrderController@viewTripOrder')->name('view_order')->middleware('company_user');











//

Route::get('/role',function (){
    $permissions=Permission::all();
   return view('create',compact('permissions')) ;
});
Route::post('/role/create',function (Request $request){
    $input['name']=$request->name;
    $input['guard_name']='web';

    $role=Role::create($input);
    $role->givePermissionTo($request->permission);


})->name('role_create');
