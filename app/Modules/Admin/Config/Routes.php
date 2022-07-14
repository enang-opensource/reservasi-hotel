<?php

namespace App\Modules\Admin\Config;

if (!isset($routes)) {
	$routes = \Config\Services::routes(true);
}

$routes->group('admin', ['namespace' => 'App\Modules\Admin\Controllers'], function ($subroutes) {

	/*** Route for Dashboard ***/
	$subroutes->add('', 'Auth::index');
	$subroutes->add('logout', 'Auth::logout');
	$subroutes->add('dashboard', 'Home::index', ['filter' => 'auth-user']);

	//starts room
	$subroutes->group('login', function ($routes) {
		$routes->add('verifikasi', 'Auth::verifikasi');
	});
	//end room

	//starts room
	$subroutes->group('room', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'Room::index');
		$routes->add('insert', 'Room::insert');
		$routes->add('list', 'Room::list');
		$routes->get('detail/(:any)', 'Room::detail/$1');
		$routes->get('delete/(:any)', 'Room::delete/$1');
		$routes->get('edit/(:any)', 'Room::edit/$1');
		$routes->add('edit_proses', 'Room::edit_process');
		##########################################
		$routes->get('image/(:any)/(:any)', 'Room::image/$1/$2');
	});
	//end room

	//starts transaction
	$subroutes->group('transaction', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'Transaction::index');
	});
	//end transaction

	//starts payment
	$subroutes->group('payment', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'Payment::index');
	});
	//end payment

	//starts category
	$subroutes->group('category', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'Category::index');
		$routes->add('insert', 'Category::insert');
		$routes->add('edit', 'Category::update');
		$routes->get('delete/(:any)', 'Category::delete/$1');
		$routes->get('edit/(:any)', 'Category::update_menu/$1');

	});
	//end category

	//starts report
	$subroutes->group('report', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'Report::index');
	});
	//end report

	//starts user
	$subroutes->group('user', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'User::index');
	});
	//end user

	//starts checkin
	$subroutes->group('checkin', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('(:any)/(:any)', 'Room::checkin/$1/$2');
	});
	//end checkin

	//starts chat
	$subroutes->group('chat', ['namespace' => 'App\Modules\Admin\Controllers', 'filter' => 'auth-user'], function ($routes) {
		$routes->add('', 'Chat::index');
		$routes->add('room/(:any)/(:any)', 'Chat::room_chat/$1/$2');
		$routes->add('add', 'Chat::add');
	});
	//end chat
});
