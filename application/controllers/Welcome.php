<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		// $this->template->load('template_landing','landing/landing_page');
		$this->template->load('template_landing','landing/landing_page');
	}
	
	public function verifikasi()
	{
		$this->template->load('template_landing','public/verification_page');
	}

}