<?php
namespace App\Modules\Users\Controllers;

use App\Libraries\Midtrans;
use App\Modules\Users\Models\M_transaksi;
use App\Modules\Users\Models\M_pembayaran;

class Snap extends BaseController {

	/**
	* Index Page for this controller.
	*
	* Maps to the following URL
	* 		http://example.com/index.php/welcome
	*	- or -
	* 		http://example.com/index.php/welcome/index
	*	- or -
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*
	* So any other public methods not prefixed with an underscore will
	* map to /index.php/welcome/<method_name>
	* @see http://codeigniter.com/user_guide/general/urls.html
	*/


	public function __construct()
	{
		$params = array('server_key' => 'mid-server-key', 'production' => true);
		#load modul
		$this->m_transaksi = new M_transaksi;
		$this->m_pembayaran = new M_pembayaran;

		#load library
		$this->midtrans = new midtrans;
		$this->midtrans->config($params);
		base_url('url');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
		#mengambil nilai lama menginap
		$h_awal = date_create($this->request->getVar('tanggal_awal'));
		$h_keluar = date_create($this->request->getVar('tanggal_akhir'));

		$days = date_diff($h_awal, $h_keluar);

		if ($days->d==0) {
			$long = 30;
		} else {
			 $long = $days->d;
		}
		#mengambil data nilai
		$harga = $this->request->getVar('harga');

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $harga*$long, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $harga,
			'quantity' => $long,
			'name' => $this->request->getVar('nama_kamar'),
		);

		// Optional
		$item_details = array ($item1_details);

		#mengambil data cotsumer
		$fname = $this->request->getVar('fname');
		$lname = $this->request->getVar('lname');
		$telp = $this->request->getVar('telephone');
		$email = $this->request->getVar('email');

		// Optional
		$billing_address = array(
			'first_name'    => $fname,
			'last_name'     => $lname,
			'address'       => "",
			'city'          => "",
			'postal_code'   => "",
			'phone'         => $telp,
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => "Sadewa",
			'last_name'     => "Homestay",
			'address'       => "Kaliurang",
			'city'          => "Yogyakarta",
			'postal_code'   => "55162",
			'phone'         => "",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $fname,
			'last_name'     => $lname,
			'email'         => $email,
			'phone'         => $telp,
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O",$time),
			'unit' => 'minute',
			'duration'  => 1440
		);

		$enable_payments = array('bank_transfer');

		$transaction_data = array(
			'enabled_payments'		 => $enable_payments,
			'transaction_details'=> $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		#setting midtrans
		$result = json_decode($this->request->getVar('result_data'));

		#mengambil nilai lama menginap
		$h_awal = $this->request->getVar('tanggal_awal');
		$h_keluar = $this->request->getVar('tanggal_akhir');

		#mengambil nilai lama menginap
		$awal = date_create($this->request->getVar('tanggal_awal'));
		$akhir = date_create($this->request->getVar('tanggal_akhir'));

		$days = date_diff($awal, $akhir);

		if ($days->d==0) {
			$long = 30;
		} else {
			 $long = $days->d;
		}

		#mengambil data nilai
		$harga = $this->request->getVar('harga');

		#mengambil data midtrans
		#get number
		$vas_number = $result->va_numbers;
		$order_id = $result->order_id;

		#get
		$va_number = $vas_number[0]->va_number;
		$bank = $vas_number[0]->bank;

		$transaksi = [
			'id_user' => session()->get('id_user'),
			'id_kamar' => $this->request->getVar('id_kamar'),
			'tanggal_masuk' => $h_awal,
			'tanggal_keluar'	=> $h_keluar,
			'total_bayar' => $harga*$long,
			'harga_kamar' => $harga,
			'tanggal_transaksi' => date("Y-m-d")
		];

		if ($this->m_transaksi->insert_data($transaksi)) {
			$bayar = [
				'id_transaksi' => $this->m_transaksi->getInsertID(),
				'order_id' => $order_id,
				'total_bayar' => $harga*$long,
				'no_virtual' => $va_number,
				'bank_transfer' => $bank,
				'tanggal_bayar' => date("Y-m-d"),
				'status' => 0,
			];

			if ($this->m_pembayaran->insert_data($bayar)) {
				session()->setFlashdata('auth-success', 'Success, berhasil melakukan transaksi!');
			} else {
				session()->setFlashdata('auth-failed', 'Gagal, gagal melakukan pembayaran!');
			}
		} else {
			session()->setFlashdata('auth-failed', 'Gagal, gagal melakukan transaksi!');
		}

		return redirect()->to('users/payment');
		echo 'RESULT <br><pre>';
		var_dump($result);
		echo '</pre>' ;

	}
}
