<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('main_model');
		$this->load->library('layout');
	}
	

	public function index()
	{
		$data['list'] = $this->main_model->GetBoardList();
		$data['total'] = $this->main_model->GetBoardTotal();

		$this->layout->test_view('main', $data);
	}
}
