<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// Product
		$this->template->load('template_landing','landing/landing_page');
	}

	public function FunctionName(Type $var = null)
	{
		$time_start = microtime(true);
		$n = 2024353;
		$e = 5;
		$d = 1212905;

		$enkripsi = '';
		$deskripsi = '';

		$teks = 'Lemas';

		for($i = 0; $i < strlen($teks); $i++){
			$enkripsi .= gmp_strval(gmp_mod(gmp_pow(ord($teks[$i]),$e), $n));
			if($i != strlen($teks)-1){
				$enkripsi .= '|';
			}
		}

		echo $enkripsi.'<br>';

		$block = explode('|', $enkripsi);
		foreach($block as $nilai){
			$deskripsi .= chr(gmp_strval(gmp_mod(gmp_pow($nilai, $d), $n)));
		}

		$time_end = microtime(true);
		$time = $time_end - $time_start;

		echo $deskripsi;
	}
}
