<?php

namespace App\Modules\Users\Config;

if (!isset($routes)) {
	$routes = \Config\Services::routes(true);
}

$routes->group('users', ['namespace' => 'App\Modules\Users\Controllers'], function ($subroutes) {

	/*** Route for Dashboard ***/
	$subroutes->add('', 'Home::index');
	$subroutes->add('dashboard', 'Home::index');
	$subroutes->add('invoice/(:any)', 'Home::invoice/$1');

	//starts register
	$subroutes->group('register', function ($routes) {
		$routes->add('', 'Auth::register');
	});
	//end register

	//starts logout
	$subroutes->group('logout', function ($routes) {
		$routes->add('', 'Auth::logout');
	});
	//end logout

	//starts login
	$subroutes->group('login', function ($routes) {
		$routes->add('', 'Auth::login');
	});
	//end login

	//starts about
	$subroutes->group('about', function ($routes) {
		$routes->add('', 'About::index');
	});
	//end about

	//starts room
	$subroutes->group('room', function ($routes) {
		$routes->add('', 'Room::index');
		$routes->add('list', 'Room::a_room');
		$routes->add('detail/(:any)/(:any)/(:any)', 'Room::detail/$1/$2/$3');
	});
	//end room

	//starts complaint
	$subroutes->group('complaint', function ($routes) {
		$routes->add('', 'Complaint::index');
		$routes->add('pengaduan', 'Complaint::send_complaint');
	});
	//end complaint

	//starts complaint
	$subroutes->group('fasilitas', function ($routes) {
		$routes->add('', 'Fasilitas::index');
	});
	//end complaint

	//starts komentar
	$subroutes->group('komentar', function ($routes) {
		$routes->add('', 'Komentar::index');
	});
	//end komentar

	//starts midtrans
	$subroutes->group('midtrans', function ($routes) {
		$routes->add('', 'Snap::token');
		$routes->add('finish', 'Snap::finish');
	});
	//end midtrans

	//starts transaksi
	$subroutes->group('transaction', function ($routes) {
		$routes->add('', 'Home::transaksi');
	});
	//end transaksi

	//starts transaksi
	$subroutes->group('payment', function ($routes) {
		$routes->add('', 'Home::payment');
		$routes->add('update', 'Notification::index');
	});
	//end transaksi

	//starts transaksi
	$subroutes->group('chat', function ($routes) {
		$routes->add('', 'Chat::index');
			$routes->add('add', 'Chat::add');
	});
	//end transaksi
});
