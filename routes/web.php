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

/*Home*/
Route::get('/', function () {return view('index');});

/*Administrator*/
Route::get('/administratorlogin', function () {return view('Administrator/AdministratorLoginView');})->name('administratorlogin');
Route::post('/administratorlogin', 'AdministratorController@administratorlogin');
Route::get('/administratorpage', function () {return view('Administrator/AdministratorPageView');})->name('administratorpage');
Route::get('/administratoractivitylog', 'AdministratorController@administratoractivitylog', function () {return view('Administrator/AdministratorActivityLogView');})->name('administratoractivitylog');
Route::get('/useractivityloga', 'AdministratorController@useractivityloga', function () {return view('Administrator/UserActivityLogViewA');})->name('useractivityloga');
Route::get('/changepassworda', function () {return view('Administrator/ChangePasswordViewA');})->name('changepassworda');
Route::post('/changepassworda', 'AdministratorController@changepassworda');
Route::get('/adduser', function () {return view('Administrator/AddUserView');})->name('adduser');
Route::post('/adduser', 'AdministratorController@adduser');
Route::get('/userrecords', 'AdministratorController@userrecords', function () {return view('Administrator/UserRecordsView');})->name('userrecords');
Route::get('/edituser', function () {return view('Administrator/EditUserView');})->name('edituser');
Route::post('/edituser', 'AdministratorController@edituser');
Route::get('/deleteuser/{Id}', 'AdministratorController@deleteuser');
Route::post('/deleteuser', 'AdministratorController@deleteuser');
Route::get('/userdetails', 'AdministratorController@userdetails', function () {return view('Administrator/ViewUserDetails');})->name('userdetails');

/*Users*/
Route::get('/userlogin', function () {return view('Users/UserLoginView');})->name('userlogin');
Route::post('/userlogin', 'UsersController@userlogin');
Route::get('/useractivitylogu', 'UsersController@useractivitylogu', function () {return view('Users/UserActivityLogViewU');})->name('useractivitylogu');
Route::get('/userpage', function () {return view('Users/UserPageView');})->name('userpage');
Route::get('/changepasswordu', function () {return view('Users/ChangePasswordViewU');})->name('changepasswordu');
Route::post('/changepasswordu', 'UsersController@changepasswordu');

/*Flights*/
Route::get('/onewaybookinga', function () {return view('Flights/OnewayBookingViewA');})->name('onewaybookinga');
Route::post('/onewaybookinga', 'FlightsController@onewaybookinga');
Route::get('/onewaybookingu', function () {return view('Flights/OnewayBookingViewU');})->name('onewaybookingu');
Route::post('/onewaybookingu', 'FlightsController@onewaybookingu');
Route::get('/deleteonewaybookinga/{Id}', 'FlightsController@deleteonewaybookinga');
Route::get('/deleteonewaybookingu/{Id}', 'FlightsController@deleteonewaybookingu');
Route::get('/editonewaybookinga', function () {return view('Flights/EditOnewayBookingViewA');})->name('editonewaybookinga');
Route::post('/editonewaybookinga', 'FlightsController@editonewaybookinga');
Route::get('/editonewaybookingu', function () {return view('Flights/EditOnewayBookingViewU');})->name('editonewaybookingu');
Route::post('/editonewaybookingu', 'FlightsController@editonewaybookingu');
Route::get('/onewayrecordsa', 'FlightsController@onewayrecordsa', function () {return view('Flights/OnewayRecordsViewA');})->name('onewayrecordsa');
Route::get('/onewayrecordsu', 'FlightsController@onewayrecordsu', function () {return view('Flights/OnewayRecordsViewU');})->name('onewayrecordsu');
Route::get('/roundtripbookinga', function () {return view('Flights/RoundtripBookingViewA');})->name('roundtripbookinga');
Route::post('/roundtripbookinga', 'FlightsController@roundtripbookinga');
Route::get('/roundtripbookingu', function () {return view('Flights/RoundtripBookingViewU');})->name('roundtripbookingu');
Route::post('/roundtripbookingu', 'FlightsController@roundtripbookingu');
Route::get('/editroundtripbookinga', function () {return view('Flights/EditRoundtripBookingViewA');})->name('editroundtripbookinga');
Route::post('/editroundtripbookinga', 'FlightsController@editroundtripbookinga');
Route::get('/editroundtripbookingu', function () {return view('Flights/EditRoundtripBookingViewU');})->name('editroundtripbookingu');
Route::post('/editroundtripbookingu', 'FlightsController@editroundtripbookingu');
Route::get('/roundtriprecordsa', 'FlightsController@roundtriprecordsa', function () {return view('Flights/RoundtripRecordsViewA');})->name('roundtriprecordsa');
Route::get('/roundtriprecordsu', 'FlightsController@roundtriprecordsu', function () {return view('Flights/RoundtripRecordsViewU');})->name('roundtriprecordsu');
Route::get('/flightpayment', function () {return view('Flights/FlightPaymentView');})->name('flightpayment');
Route::post('/flightpayment', 'FlightsController@flightpayment');
Route::get('/editflightpaymenta', function () {return view('Flights/EditFlightPaymentViewA');})->name('editflightpaymenta');
Route::post('/editflightpaymenta', 'FlightsController@editflightpaymenta');
Route::get('/editflightpaymentu', function () {return view('Flights/EditFlightPaymentViewU');})->name('editflightpaymentu');
Route::post('/editflightpaymentu', 'FlightsController@editflightpaymentu');
Route::get('/flightpaymentrecordsa', 'FlightsController@flightpaymentrecordsa', function () {return view('Flights/FlightPaymentRecordsViewA');})->name('flightpaymentrecordsa');
Route::get('/flightpaymentrecordsu', 'FlightsController@flightpaymentrecordsu', function () {return view('Flights/FlightPaymentRecordsViewU');})->name('flightpaymentrecordsu');
Route::get('/deleteflightpaymenta/{Id}', 'FlightsController@flightpaymenta');
Route::get('/deleteflightpaymentu/{Id}', 'FlightsController@flightpaymentu');
Route::get('/flightticketa', function () {return view('Flights/FlightTicketViewA');})->name('flightticketa');
Route::get('/flightticketu', function () {return view('Flights/FlightTicketViewU');})->name('flightticketU');

/*Hotels*/
Route::get('/hotelbookinga', function () {return view('Hotels/HotelBookingViewA');})->name('hotelbookinga');
Route::post('/hotelbookinga', 'HotelsController@hotelbookinga');
Route::get('/hotelbookingu', function () {return view('Hotels/HotelBookingViewU');})->name('hotelbookingu');
Route::post('/hotelbookingu', 'HotelsController@hotelbookingu');
Route::get('/hotelrecordsa', 'HotelsController@hotelrecordsa', function () {return view('Hotels/HotelRecordsViewA');})->name('hotelrecordsa');
Route::get('/hotelrecordsu', 'HotelsController@hotelrecordsu', function () {return view('Hotels/HotelRecordsViewU');})->name('hotelrecordsu');
Route::get('/edithotelbookinga', function () {return view('Hotels/EditHotelBookingViewA');})->name('edithotelbookinga');
Route::post('/edithotelbookinga', 'HotelsController@edithotelbookinga');
Route::get('/edithotelbookingu', function () {return view('Hotels/EditHotelBookingViewU');})->name('edithotelbookingu');
Route::post('/edithotelbookingu', 'HotelsController@edithotelbookingu');
Route::get('/deletehotelbookinga/{Id}', 'HotelsController@deletehotelbookinga');
Route::get('/deletehotelbookingu/{Id}', 'HotelsController@deletehotelbookingu');
Route::get('/ekohotela', function () {return view('Hotels/EkoHotelViewA');})->name('ekohotela');
Route::get('/ekohotelu', function () {return view('Hotels/EkoHotelViewU');})->name('ekohotelu');
Route::get('/hotelbrusselsa', function () {return view('Hotels/HotelBrusselsViewA');})->name('hotelbrusselsa');
Route::get('/hotelbrusselsu', function () {return view('Hotels/HotelBrusselsViewU');})->name('hotelbrusselsu');
Route::get('/kigalimarriotthotela', function () {return view('Hotels/KigaliMarriottHotelViewA');})->name('kigalimarriotthotela');
Route::get('/kigalimarriotthotelu', function () {return view('Hotels/KigaliMarriottHotelViewU');})->name('kigalimarriotthotelu');
Route::get('/lagoonhotela', function () {return view('Hotels/LagoonHotelViewA');})->name('lagoonhotela');
Route::get('/lagoonhotelu', function () {return view('Hotels/LagoonHotelViewU');})->name('lagoonhotelu');
Route::get('/mestilhotela', function () {return view('Hotels/MestilHotelViewA');})->name('mestilhotela');
Route::get('/mestilhotelu', function () {return view('Hotels/MestilHotelViewU');})->name('mestilhotelu');
Route::get('/shangri-lahotela', function () {return view('Hotels/Shangri-laHotelViewA');})->name('shangri-lahotela');
Route::get('/shangri-lahotelu', function () {return view('Hotels/Shangri-laHotelViewU');})->name('shangri-lahotelu');
Route::get('/themonarchhotela', function () {return view('Hotels/TheMonarchHotelViewA');})->name('themonarchhotela');
Route::get('/themonarchhotelu', function () {return view('Hotels/TheMonarchHotelViewU');})->name('themonarchhotelu');
Route::get('/theoberoihotela', function () {return view('Hotels/TheOberoiHotelViewA');})->name('theoberoihotela');
Route::get('/theoberoihotelu', function () {return view('Hotels/TheOberoiHotelViewU');})->name('theoberoihotelu');
