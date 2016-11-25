<?php

Route::get('/', function () {
    return view('welcome');
});


// auth routing
Route::get('/login', 		'LoginController@showLogin');
Route::post('/login', 		'LoginController@doLogin');
Route::get('/register',		'LoginController@showRegister');
Route::post('/register',	'LoginController@doRegister');
Route::get('logout', function(){
	\Auth::logout();

	return Redirect::to('/');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
	Route::get('/', function(){
		return view('welcome');
		// return 1;
	});

	Route::group(['prefix' => 'kontingen'], function(){
		Route::get('/', 								'Admin\KontingenController@index');
		Route::post('/add',								'Admin\KontingenController@create');
		Route::post('/update',							'Admin\KontingenController@update');
		Route::get('/delete/{id_kontingen}',			'Admin\KontingenController@destroy');
	});

	Route::group(['prefix' => 'bidang-lomba'], function(){
		Route::get('/', 								'Admin\BidangLombaController@index');
		Route::post('/add',								'Admin\BidangLombaController@create');
		Route::post('/update',							'Admin\BidangLombaController@update');
		Route::get('/delete/{id_bidang_lomba}',			'Admin\BidangLombaController@destroy');
	});

	Route::group(['prefix' => 'registrasi-peserta'], function(){
		Route::get('/', 								'Admin\RegistrasiPesertaController@index');
		Route::post('/plus',							'Admin\RegistrasiPesertaController@plus');
		Route::get('/min/{id_peserta}',					'Admin\RegistrasiPesertaController@minus');

		Route::post('/update',							'Admin\RegistrasiPesertaController@update');
		Route::get('/delete/{id_bidang_lomba}',			'Admin\RegistrasiPesertaController@destroy');
	});

	Route::group(['prefix' => 'penilaian'], function(){
		Route::get('/',									'Admin\PenilaianController@index');
		Route::post('/update',							'Admin\PenilaianController@update');

	});

});


Route::group(['prefix' => 'peserta','middleware' => ['auth']], function(){
	Route::get('/', function(){
		return view('welcome');
	});

	Route::group(['prefix' => 'bidang-lomba'], function(){
		Route::get('/',									'Peserta\BidangLombaController@index');
		Route::get('/daftar/{id_bidang_lomba}',			'Peserta\BidangLombaController@daftar');
		Route::get('/batal/{id_bidang_lomba}',			'Peserta\BidangLombaController@batal');
	});
});


Route::get('/home', function(){
	return view('welcome');
});

// Route::auth();





