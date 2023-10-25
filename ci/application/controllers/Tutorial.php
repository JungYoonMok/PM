<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tutorial extends CI_Controller {

  public function index()
	{
		$this->load->view('index');
	}

	public function second()
	{
		$this->load->view('second');
	}

	public function phpinfo()
	{
		$this->load->view('phpinfo');
	}

}
