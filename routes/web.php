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
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Models\Permission;


    Auth::routes();

    Route::get('/home', ['as'=>'home', 'uses' => 'HomeController@index']);


    // Home
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/trip/search', 'HomeController@search')->name('search_trip');//search available flights


    // Ticket Booking
        Route::get('/booking/passenger-details', 'TicketBookingController@passengerDetails')->name('passenger_details')->middleware('permission:book ticket');

    // Users
        Route::get('/user/all', 'UserController@all')->name('view_all_user')->middleware('permission:view all user');
        Route::get('/user/add', 'UserController@add')->name('add_user')->middleware('permission:add user');
        Route::post('/user/add', 'UserController@addPost')->name('add_user_post')->middleware('permission:add user');
        Route::get('/user/edit/{user}', 'UserController@edit')->name('edit_user')->middleware('permission:edit user');
        Route::post('/user/edit/{user}', 'UserController@editPost')->name('edit_user_post')->middleware('permission:edit user');
        Route::post('/user/delete', 'UserController@delete')->name('delete_user')->middleware('permission:delete user');


    // Port
        Route::get('/city/all', 'PortController@all')->name('view_all_port')->middleware('permission:view all cities');
        Route::get('/city/add', 'PortController@add')->name('add_port')->middleware('permission:add cities');
        Route::post('/city/add', 'PortController@addPost')->name('add_port_post')->middleware('permission:add cities');
        Route::get('/city/edit/{port}', 'PortController@edit')->name('edit_port')->middleware('permission:edit cities');
        Route::post('/city/edit/{port}', 'PortController@editPost')->name('edit_port_post')->middleware('permission:edit cities');
        Route::post('/city/delete', 'PortController@delete')->name('delete_port')->middleware('permission:delete cities');


    // Passenger Type
        Route::get('/passenger-type/all', 'PassengerTypeController@all')->name('view_all_passenger_type')->middleware('permission:view all passenger types');
        Route::get('/passenger-type/add', 'PassengerTypeController@add')->name('add_passenger_type')->middleware('permission:add passenger types');
        Route::post('/passenger-type/add', 'PassengerTypeController@addPost')->name('add_passenger_type_post')->middleware('permission:add passenger types');
        Route::get('/passenger-type/edit/{type}', 'PassengerTypeController@edit')->name('edit_passenger_type')->middleware('permission:edit passenger types');
        Route::post('/passenger-type/edit/{type}', 'PassengerTypeController@editPost')->name('edit_passenger_type_post')->middleware('permission:edit passenger types');
        Route::post('/passenger-type/delete', 'PassengerTypeController@delete')->name('delete_passenger_type')->middleware('permission:delete passenger types');


    // Ferry

       Route::get('/airplane/all', 'FerryController@all')->name('view_all_ferry')->middleware('permission:view all planes');
       Route::get('/airplane/add', 'FerryController@add')->name('add_ferry')->middleware('permission:add planes');
       Route::post('/airplane/add', 'FerryController@addPost')->name('add_ferry_post')->middleware('permission:add planes');
       Route::get('/airplane/edit/{airplane}', 'FerryController@edit')->name('edit_ferry')->middleware('permission:edit planes');
       Route::post('/airplane/edit/{airplane}', 'FerryController@editPost')->name('edit_ferry_post')->middleware('permission:edit planes');
       Route::post('/airplane/delete', 'FerryController@delete')->name('delete_ferry')->middleware('permission:delete planes');




    // Trip
        Route::get('/trip/all', 'TripController@all')->name('view_all_trip')->middleware('permission:view all flights');
        Route::get('/trip/add', 'TripController@add')->name('add_trip')->middleware('permission:add flights');
        Route::post('/trip/add', 'TripController@addPost')->name('add_trip_post')->middleware('permission:add flights');
        Route::post('/trip/delete', 'TripController@delete')->name('delete_trip')->middleware('permission:delete flights');
        Route::get('/trip/edit/{trip}', 'TripController@edit')->name('edit_trip')->middleware('permission:edit flights');
        Route::post('/trip/edit/{trip}', 'TripController@editPost')->name('edit_trip_post')->middleware('permission:edit flights');


    //JR Routes...
    //TicketBookingController
        Route::post('/booking/ticket_store', 'TicketBookingController@storeTicket')->name('ticketStore')->middleware('permission:book ticket');
        Route::get('/booking/success', 'TicketBookingController@storeTicket')->name('success')->middleware('permission:book ticket');

    //TicketObserveController
        Route::get('/ticket/all', 'TicketObserveController@getAllTicket')->name('all_ticket')->middleware('company_user');
        Route::get('/ticket/view_order/{ticket}', 'TicketObserveController@viewOrder')->name('view_ticket_order')->middleware('permission:view single order');
        Route::post('/ticket/delete', 'TicketObserveController@delete')->name('delete_ticket')->middleware('company_user:admin');

    //OrderController
        Route::get('/order/all', 'OrderController@allOrder')->name('all_order')->middleware('permission:view all order');
        Route::post('/order/delete', 'OrderController@delete')->name('delete_order')->middleware('permission:delete order');
        Route::get('/order/view_ticket/{order}', 'TicketObserveController@getTicketForOrder')->name('view_ticket')->middleware('permission:view single order');
        Route::get('/order/print/{order}', 'OrderController@orderPrint')->name('order_print')->middleware('permission:print ticket');
        Route::get('/trip/view_order/{trip}', 'OrderController@viewTripOrder')->name('view_order')->middleware('permission:view all order');

    //SettingsController
        route::get('/settings/edit','SettingsController@GetSettings')->name('change_settings');
        route::post('/settings/save','SettingsController@SaveSettings')->name('save_settings');


    //promona routes
    //Roles
        Route::get('/role', 'RoleController@createRoles')->middleware('permission:create roles')->name('add_role');
        Route::post('/role/create', 'RoleController@storeRoles')->middleware('permission:create roles')->name('role_create');
        Route::post('/role/delete', 'RoleController@deleteRole')->middleware('permission:delete roles')->name('role_delete');
        Route::get('/role/details/{id}', 'RoleController@viewRoleDetails')->middleware('permission:create roles')->name('role_details');
        Route::get('/role/edit/{id}', 'RoleController@editRole')->middleware('permission:edit roles')->name('role_edit');
        Route::post('/role/edit/{role}', 'RoleController@editRoleStore')->middleware('permission:edit roles')->name('role_edit_store');
        Route::post('/role/remove/user/{role}', 'RoleController@removeUser')->middleware('permission:edit role')->name('remove_role_user');
        Route::get('/role/all', 'RoleController@viewRoles')->middleware('permission:view all roles')->name('view_all_roles');
        Route::get('/role/assignment', 'RoleController@assignRoles')->middleware('permission:assign roles');
        Route::post('/role/assignment/store', 'RoleController@storeAssignedRoles')->middleware('permission:assign roles')->name('role_assignment_store');

